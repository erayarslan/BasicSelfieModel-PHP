<?php
class Instagram {
  protected $barzoCount = 50;
  
  protected $gender;
  protected $areYouFamous = false;
  protected $like = 0;

  function __construct($gender) {
    $this->gender = $gender;
  }

  function setAreYouFamous($areYouFamous) {
    $this->areYouFamous = $areYouFamous;
  }

  function profile() {
    return $this->areYouFamous ? "sexy" : "barzo";
  }
}

class Selfie extends Instagram {
  private $showBoobs = false;

  function __construct($gender) {
    parent::__construct($gender);
  }

  function takePhoto($showBoobs) {
    $this->showBoobs = $showBoobs;

    if ($this->showBoobs) {
      $this->setAreYouFamous(true);
    }

    if ($this->gender === "male" && !$this->areYouFamous) {
      $this->like = 7;
    } else if ($this->gender === "male" && $this->areYouFamous) {
      $this->like = 300 - $this->barzoCount;
    } else if ($this->gender == "female") {
      if (!$this->areYouFamous) {
        $this->like = 20; // bff mode #on
      } else if ($this->areYouFamous) {
        $this->like = 700;
      }

      while ($this->showBoobs && $this->barzoCount < 150) {
        $this->like += $this->barzoCount;
        $this->barzoCount++;
      }
    } else {
      echo "Go away fuckin faggot.";
    }
  }
}
