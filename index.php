<?php
/*
** Sorting by spcaeship operator
*/

class User
{
	protected $name;
	protected $age;

	public function __construct($name, $age)
	{
		$this->name=$name;
		$this->age=$age;
	}

	public function name()
	{
		return $this->name;
	}

	public function age()
	{
		return $this->age;
	}
}


class userCollection
{

	public $users; 
	
	public function __construct(array $users)
	{
		$this->users = $users;
	}

	public function users()
	{
		return $this->users;
	}

	public function sortBy($property)
	{
		
		usort($this->users, function($userOne, $userTwo) use ($property)
		{
		
			return $userTwo->$property() <=> $userOne->$property();
		});
	}

}


$users = new userCollection([
						 		 new user('Grand dad',		75)
								,new user('Son', 			44)
								,new user('Grand mother',	71)
								,new user('Grand son',   	 3)
					]);

$users->sortBy('name'); // or sortBy age
print_r($users->users());