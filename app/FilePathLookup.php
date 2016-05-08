<?php namespace bsquared;

use Illuminate\Database\Eloquent\Model;


class FilePathLookup extends Model {

	/*
	 * Configure custom database configurations.
	 */
    protected  $table = 'file_path_lookup';
    protected $primaryKey = 'destination_id';

}
