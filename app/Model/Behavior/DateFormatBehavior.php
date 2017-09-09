<?php
/**
 * @created    25/01/2014
 * @copyright  Copyright (C) 2014
 * @license    Proprietary
 * @author     Gagandeep Gambhir
 */
class DateFormatBehavior extends ModelBehavior
{
    /**
     * Initiate setup
     * 
     * @param Model $model
     * @param Array $config
     */
    public function setup(Model $model, $config = array())
    {
        $this->settings[$model->alias] = $config;
    }

    /**
     * @param \Model $model
     * @param Array $results
     * @param boolean $primary
     */
    public function afterFind(Model $model, $results, $primary = false)
    {
        parent::afterFind($model, $results, $primary);

        foreach ($results as $key => $record)
        {
            foreach ($this->settings[$model->alias] as $field => $format)
            {
                if (isset($record[$model->alias]) && isset($results[$key][$model->alias][$field]))
                {
                    $results[$key][$model->alias][$field] = DateUtility::getDate($record[$model->alias][$field], $format);
                }
            }
        }

        return $results;
    }

    /**
     * @param \Model $model
     * @param Array $options
     */
    public function beforeSave(Model $model, $options = array())
    {
        foreach ($this->settings[$model->alias] as $field => $format)
        {
            if (isset($model->data[$model->alias][$field]))
            {
                $model->data[$model->alias][$field] = DateUtility::getDate($model->data[$model->alias][$field], DateUtility::DATETIME_FORMAT);
            }
        }
        
        parent::beforeSave($model, $options);
    }
}