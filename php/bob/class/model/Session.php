<?php

/**
 * Description of Session
 *
 * @author H. Donkers
 */
namespace model;

class Session
{
	protected $sid;
	protected $data = array();
	protected $filename;
	const EXT = ".session";
	
	public function __construct($sid = null)
	{
		$this->sid = $sid!==null? $sid : self::newId();
		$this->filename = \Configuration::getSessionDir()."/".$this->sid.self::EXT;
		
		if(file_exists($this->filename))
		{
			$this->data = unserialize(reset(file($this->filename)));
		}
		else
		{
			touch($this->filename);
		}
	}
	
	public function __destruct()
	{
		$fp = fopen($this->filename, "w");
		fputs($fp, serialize($this->data));
		fclose($fp);
	}
	
	public function getSid()
	{
		return $this->sid;
	}
	
	public static function newId()
	{
		return sha1(time().rand(0,999));
	}
	
	public static function exists($sid)
	{
		return file_exists(\Configuration::getSessionDir()."/".$sid.self::EXT);
	}
	
	public static function get($sid)
	{
		if(self::exists($sid))
			return new self($sid);
		else
			trigger_error("session does not exist");
	}
	
	public function __get($var)
	{
		if(isset($this->data[$var]))
			return $this->data[$var];
		else
			return null;
	}
	
	public function __set($var, $val)
	{
		$this->data[$var] = $val;
	}
	
	public function __isset($var)
	{
		return isset($this->data[$var]);
	}
}

?>