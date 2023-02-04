<?php 
	class Welcome {
		private $id;
		private $title1;
		private $title2;

		public function __construct ($array){
	        foreach ($array as $welcome => $value) {
	            $this->$welcome = $value;
	        }
    	}
	
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle1()
    {
        return $this->title1;
    }

    /**
     * @param mixed $title1
     *
     * @return self
     */
    public function setTitle1($title1)
    {
        $this->title1 = $title1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle2()
    {
        return $this->title2;
    }

    /**
     * @param mixed $title2
     *
     * @return self
     */
    public function setTitle2($title2)
    {
        $this->title2 = $title2;

        return $this;
    }
}
?>