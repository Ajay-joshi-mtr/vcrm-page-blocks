<?php

namespace Pvtl\VoyagerPageBlocks;


class MockedModel
{
    public function __construct($datem)
    {
        if (is_array($datem)) {
            foreach ($datem as $key => $data) {
                $this->$key = $data;
            }
        }
    }

    public function getKey()
    {
        return $this->id ? $this->id : '';
    }
}
