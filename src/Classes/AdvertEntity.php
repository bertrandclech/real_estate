<?php

class AdvertEntity
{
    private int $id_avert;
    private string $title;
    private string $description;
    private string $postcode;
    protected string $city;
    protected int $price;
    protected string $reservation_message;
    protected int $category_id;
    protected string $created_at;

    public function __construct(array $datas)
    {
        foreach ($datas as $key => $data) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($data);
            }
        }
    }

    /**
     * Get the value of id_avert
     */ 
    public function getId_avert()
    {
        return $this->id_avert;
    }

    /**
     * Set the value of id_avert
     *
     * @return  self
     */ 
    public function setId_avert($id_avert)
    {
        $this->id_avert = $id_avert;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of postcode
     */ 
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set the value of postcode
     *
     * @return  self
     */ 
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of reservation_message
     */ 
    public function getReservation_message()
    {
        return $this->reservation_message;
    }

    /**
     * Set the value of reservation_message
     *
     * @return  self
     */ 
    public function setReservation_message($reservation_message)
    {
        $this->reservation_message = $reservation_message;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}
