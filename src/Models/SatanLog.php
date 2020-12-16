<?php


namespace Dcat\Admin\Satan\Admin\Log\Models;


class SatanLog extends \Illuminate\Database\Eloquent\Model
{
    protected $dateFormat='U';
    protected $table = 'satan_log';
    protected $fillable=[
        'url','method','param','headers','user_id',
        'created_at','updated_at','ip'
    ];
    protected $casts=[
        'param'=>'json',
        'headers'=>'json'
    ];
}
