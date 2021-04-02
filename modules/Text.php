<?php


namespace MarbleUI\modules;

/**
 * Class Text
 *
 * @property string $text
 * @property float $size
 * @property array $position
 * @property float $x
 * @property float $y
 * @package MarbleUI\modules
 */
class Text extends BaseObject
{
    /**
     * @var string
     */
    protected string $text;

    /**
     * Text constructor.
     *
     * @param object $agk
     */
    public function __construct(object $agk)
    {
        parent::__construct($agk);

        $this->agkID = $this->agk->CreateText('');

    }

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        switch ($property) {
            case 'text':
                return $this->text;
                break;
            case 'size':
                return $this->agk->GetTextSize($this->agkID);
                break;
            case 'position':
                return [$this->agk->GetTextX($this->agkID), $this->agk->GetTextY($this->agkID)];
                break;
            case 'x':
                return $this->agk->GetTextX($this->agkID);
                break;
            case 'y':
                return $this->agk->GetTextY($this->agkID);
                break;

        }
    }

    /**
     * @param $property
     * @param $value
     */
    public function __set($property, $value)
    {
        switch ($property) {
            /**Обновляет строку текстового
             * объекта новый текст будет
             * отображаться при следующем
             * обновлении экрана.
             */
            case 'text':
                $this->text = $value;
                $this->agk->SetTextString($this->agkID, $value);
                break;
            case 'size':
                $this->agk->SetTextSize($this->agkID, $value);
                break;
            case 'position':
                $this->agk->SetTextPosition($this->agkID, $value[0], $value[1]);
                break;
            case 'x':
                $this->agk->SetTextX($this->agkID, $value );
                break;
            case 'y':
                $this->agk->SetTextY($this->agkID, $value );
                break;
        }
    }

    /**
     *
     * @return void
     */
    public function free()
    {
        $this->agk->DeleteText($this->agkID);
    }

    /**
     * Проверить, уничтожен ли объект.
     *
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->agk->GetTextExists($this->agkID) ? true : false;
    }


}