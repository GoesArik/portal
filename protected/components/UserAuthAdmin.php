<?php class UserAuthAdmin extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=UserAdminModel::model()->find('LOWER(username)=?',array(strtolower($this->username)));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->id_user;
			$this->username=$user->username;
			$this->setState('nama', $user->nama);
			$this->setState('id_bidang', "0");
			$this->setState('level', $user->level);
			$this->setState('pengadaan', "0");
			if($user->level=="admin")
			{
				$this->setState('route_admin', "cms_admin");
			}
			else if($user->level=="superadmin")
			{
				$this->setState('route_admin', "cms_superadmin");
			}
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}