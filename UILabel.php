<?php

namespace MarbleUI;

/**
 * Class UILabel
 */
class UILabel extends UIWidget
{

    public function __construct($AppGameKit)
    {
        parent::__construct($AppGameKit);

        $agk = $this->AppGameKit;

        $this->indexID = $agk->CreateText('');

        $agk->SetTextSize($this->indexID, 25);

    }


    protected function setPosition(array $position)
    {
        $this->position =  $position;
        $this->AppGameKit->SetTextPosition($this->indexID, $position[0], $position[1]);
    }

    protected function setText(string $text)
    {
        $this->text = $text;
        $this->AppGameKit->SetTextString($this->indexID,$this->text);
    }
}