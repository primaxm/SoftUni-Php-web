<?php


class DateModifier {

    public function dateDif($first, $second) {
        $datetime1 = DateTime::createFromFormat('Y m d', $first);
        $datetime2 = DateTime::createFromFormat('Y m d', $second);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->days;
    }
}