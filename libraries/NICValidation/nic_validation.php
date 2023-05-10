
<?php

            function getDOBAndAgeFromNIC($nic) {

                    // Extract the year, month, and day of birth from the NIC number.
                    if (strlen($nic) == 10) {
                        // 10-digit format
                        $dobYear = intval(substr($nic, 0, 2));
                        $dobDays = intval(substr($nic, 2, 3));
                        if ($dobDays > 500) {
                            $dobYear += 1900;
                            $dobDays -= 500;
                        } else {
                            $dobYear += 2000;
                        }
                    } elseif (strlen($nic) == 12) {
                           // Extract the year, month, and day of birth from the NIC number.
                            $dobYear = intval(substr($nic, 0, 4));
                            $dobDays = intval(substr($nic, 4, 3));
                            if ($dobDays > 500) {
                                $dobYear -= 500;
                                $dobDays -= 500;
                            }
                    }

                    $dobMonth = 0;
                            for ($i = 0; $i < 12; $i++) {
                                if ($dobDays <= daysInMonth($dobMonth, $dobYear)) {
                                    break;
                                }
                                $dobDays -= daysInMonth($dobMonth, $dobYear);
                                $dobMonth++;
                            }
                            $dobMonth++;
                            $dobDay = $dobDays;

                            // Calculate the age from the date of birth.
                            $age = date('Y') - $dobYear;
                            if (date('md') < sprintf('%02d%02d', $dobMonth, $dobDay)) {
                                $age--;
                            }

                        // Return the date of birth and age as an array.
                        return array(
                            'dob' => sprintf('%04d/%02d/%02d', $dobYear, $dobMonth, $dobDay),
                            'age' => $age
                        );

            }

            // Helper function to calculate the number of days in a given month.
            function daysInMonth($month, $year) {
                return cal_days_in_month(CAL_GREGORIAN, $month + 1, $year);
            }

?>
