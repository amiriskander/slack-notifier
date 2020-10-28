<?php

namespace AmirIskander\SlackNotifier;

trait Common
{
    /**
     * @return array
     */
    public function getSnakeCaseArray()
    {
        $result = array();

        // Convert the class properties to an array format key => value
        foreach ($this as $key => $value) {
            // Check if the value is a non-scalar type
            if (is_null($value)) {
                continue;
            }
            if (is_object($value) && method_exists($value, 'getSnakeCaseArray')) {

                // Construct snake case from object recursively
                $value = $value->getSnakeCaseArray();
            } elseif (is_array($value)) {

                // Construct array of data
                $arr = [];
                foreach ($value as $nestedKey => $nestedValue) {
                    if (is_object($nestedValue) && method_exists($nestedValue, 'getSnakeCaseArray')) {
                        $arr[$nestedKey] = $nestedValue->getSnakeCaseArray();
                    } else {
                        $arr[$nestedKey] = $nestedValue;
                    }
                }
                $value = $arr;
            }

            // Convert key to snake case representation
            $key          = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));
            $result[$key] = $value;
        }

        return $result;
    }
}