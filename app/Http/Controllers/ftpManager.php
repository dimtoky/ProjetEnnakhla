<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ftpclients;
use APp\User;

class ftpManager extends Controller
{    /*
    |--------------------------------------------------------------------------
    | Controlleur des fonctions FTP
    |--------------------------------------------------------------------------
    |
    | Ce controlleur regroupe les fonctions qui permettent de manipuler les
    | fichiers sur le serveur FTP
    |
    */


/**
     * récupére la liste de tous les fichiers présent sur le seveur FTP et renvoie un tableau contenant le nom et les info des fichiers
     *
     * @return array $listuser
     */
     public function getfiles()
     {
     
        $ftpadmin = ftpclients::where('user_id', 0)->first();
        $ftpclients = User::where('role_id',1)->get();
        $listuser = array();

        $conn_id = ftp_connect(env('FTP_REMOTESERVER'));

        $login_result = ftp_login($conn_id, $ftpadmin->nom, $ftpadmin->mot_de_passe);

       foreach ($ftpclients as $ftpclient)
            {
                $listuser[] = $this->recursiveFilesList($conn_id, '/'.$ftpclient->name, $ftpclient->name, TRUE);

            }
 
            
        return $listuser;
    }




/**
     * récupére la liste de tous les fichiers présent dans le répértoire d'un utilisateur sur le seveur FTP
     * et renvoie un tableau contenant le nom et les info des fichiers
     * @return array $listuser
     */
    public function getclientfiles($id)
    {
        $ftpclient = User::where('id',$id)->first();
        $ftpadmin = ftpclients::where('user_id',0)->first();
      
       
        $listuser = array();

        $conn_id = ftp_connect(env('FTP_REMOTESERVER'));

        $login_result = ftp_login($conn_id, $ftpadmin->nom, $ftpadmin->mot_de_passe);

        
       $listuser = $this->recursiveFilesList($conn_id, '/'.$ftpclient->name, $ftpclient->name, TRUE);
      

        return $listuser;
    }



/**
     * Méthode permettant de formater la chaine de caractéres renvoyé par ftp_rawlist en tableau
     *
     * @return array $detailedList
     */
private function ftpGetList($ftpConn, $directory)
{
    $simpleList = $detailedList = array();
    // If we have a FTP rawlist to work with
    if (is_array($rows = @ftp_rawlist($ftpConn, $directory))) {
        foreach ($rows as $row) {
            // Split row up by spaces and set keys on $item array
            $chunks = preg_split("/\\s+/", $row);
            list($item['rights'], $item['number'], $item['user'], $item['group'], $item['size'], $item['month'], $item['day'], $item['time']) = $chunks;
            // Also set if this is a dir or file
            $item['type'] = $chunks[0][0] === 'd' ? 'directory' : 'file';
            // Splice the array and finally work out $simpleList and $detailedList
            array_splice($chunks, 0, 8);
            $detailedList[implode(" ", $chunks)] = $item;
            $simpleList[] = implode(" ", $chunks);
        }
        // Return simple array list and detailed items list also
        return array('simpleList' => $simpleList, 'detailedList' => $detailedList);
    }
    return false;
}



/**
     * Méthode recursive permettant de trouver les fichiers présent dans des sous-dossiers
     *
     * @return array $fileslist
     */
private function recursiveFilesList($con, $dir, $client, $call)
{
    static $fileslist = array();
    $files = array();
    $files = $this->ftpGetList($con, $dir);
$i = 0;
if ($call ==TRUE) 
{
    $fileslist = NULL;
}
if (!$files) {
    return $fileslist = NULL;
}
else {
      foreach ($files['detailedList'] as $file) {
       if ($file['type'] != 'directory') {
       
        $fileslist[] =  array('name' => $files['simpleList'][$i],'client' => $client,'info' => $file);
    }
    else {
       $this->recursiveFilesList($con, $dir.'/'.$files['simpleList'][$i], $client, FALSE);
        
    }
$i++;
    }
   


return $fileslist;
}
  

} 
  
}
