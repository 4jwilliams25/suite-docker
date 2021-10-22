<?php

require 'clients/base/filters/operators/operators.php';

$viewdefs['base']['filter']['operators']['Tagselect'] = array(
    '$contains' => 'LBL_TAGSELECT_OPERATOR_CONTAINS',
    '$not_contains' => 'LBL_TAGSELECT_OPERATOR_NOT_CONTAINS',
    '$starts' => 'LBL_TAGSELECT_OPERATOR_STARTS_WITH',
);
