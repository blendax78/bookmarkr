<?php

namespace Airwatch\Models;

// Doctrine Model for Bookmarks

/**
 * @Entity @Table(name="bookmarks")
 */
class Bookmark extends Model
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $title;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $url;

    /**
     * @Column(type="integer")
     * @var integer
     */
    protected $click_count;

    /**
     * @Column(type="integer")
     * @var integer
     */
    protected $status;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getURL() {
        return $this->url;
    }

    public function setURL($url) {
        $this->url = $url;
    }

    public function getClickCount() {
        return $this->click_count;
    }

    public function setClickCount($click_count) {
        $this->click_count = $click_count;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}
