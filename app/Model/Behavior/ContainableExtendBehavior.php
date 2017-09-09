<?php
App::uses('ContainableBehavior', 'Model/Behavior');

class ContainableExtendBehavior extends ContainableBehavior 
{
    public function containments(Model $Model, $contain, $containments = array(), $throwErrors = null) 
    {
        foreach($contain as $assoc_model => $assoc)
        {
            if (is_numeric($assoc_model))
            {
                unset($contain[$assoc_model]);
                $assoc_model = $assoc;
            }
            
            if ($Model->{$assoc_model}->hasField("is_deleted") && !isset($contain[$assoc_model]["conditions"]['is_deleted']))
            {
                $contain[$assoc_model]["conditions"][$assoc_model . '.is_deleted'] = 0;
            }
        }
        
        return parent::containments($Model, $contain, $containments, $throwErrors);
    }
}