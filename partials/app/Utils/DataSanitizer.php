<?php

namespace Full\Recruitment\Utils;

class DataSanitizer
{
    public function sanitizeUserData(array $userData)
    {
        return $this->sanitizeArray($userData);
    }

    private function sanitizeArray(array $data)
    {
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $sanitizedData[$key] = $this->sanitizeArray($value);
            } else {
                $sanitizedData[$key] = is_string($value) ? $this->sanitizeString($value) : $value;
            }
        }
        return $sanitizedData;
    }

    private function sanitizeString(string $value): string
    {
        return trim(filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    }
}
