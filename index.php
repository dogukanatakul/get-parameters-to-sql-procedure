<?php
// Request: ?ProcedureName&ParamOne=1&ParamTwo=2
        $sql = [];
        $sql[] = "EXEC";
        foreach ($request->toArray() as $key => $value) {
            if (empty($value)) {
                $sql[] = $key;
            } else {
                $sql[] = "@" . $key . "='" . $value . "',";
            }
        }
        $sqlText = trim(implode(" ", $sql));
        $sqlText = trim(rtrim($sqlText, ","));
// Return: EXEC ProcedureName @ParamOne='1', @ParamTwo='2'
