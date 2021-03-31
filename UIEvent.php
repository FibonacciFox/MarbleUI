<?php
namespace MarbleUI;

/**
 * Class UIEvent
 *
 *
 * @property string $id   ID элемента.
 * @property array $position   [x,y]
 * @property string $text   текст
 * @property-read  int $indexID
 */
abstract class UIEvent
{
    /**
     * @var object
     */
    protected object $AppGameKit;
    /**
     * Строковый id UI
     * @var string
     */
    protected string $id;
    /**
     * Index Виджета в AppGameKit
     *
     * @var int
     */
    protected int $indexID;
    /**
     * @var array
     */
    protected array $position;

    /**
     * @var string
     */
    protected string $text;

    public function __get($property)
    {
        switch ($property) {
            case 'id':
                return $this->id;
                break;
            case 'position':
                return $this->position;
                break;
            case 'text':
                return $this->text;
                break;
            case $this->id:
                return $this->indexID;
                break;
        }
    }

    public function __set($property, $value)
    {
        switch ($property) {
            case 'id':
                $this->id = $value;
                break;
            case 'position':
                $this->setPosition($value);
                break;
            case 'text':
                $this->setText($value);
                break;
        }
    }


    abstract protected function setPosition(array $position);

    abstract protected function setText(string $text);

}