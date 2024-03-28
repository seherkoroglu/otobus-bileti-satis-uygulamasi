<?php

namespace App\Models;

use CodeIgniter\Model;

class TerminallerModel extends Model
{
    protected $table = "terminaller";
    protected $primaryKey = 'terminalID';
    protected $allowedFields = ['terminalID', 'terminalName', 'city', 'cityCode', 'peronLetter'];

}
?>




