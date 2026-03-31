<?php
class Category extends Model{
use HasFactory;
protected $table = "dm_the_loai";
protected $primaryKey = "id";
public $timestamps = false;
}
