<?php
class batch_details
{
    public $conn;
    public $query;
    public $statement;

    function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=brc;charset=utf8", "root", "");
        session_start();

        if (isset($_COOKIE["user_id"]) && isset($_COOKIE["email"])) {
            $_SESSION['user_id'] = $_COOKIE["user_id"];
            // You can also re-validate the user from the database if needed
        }
    }

    function execute($data = null)
    {
        $this->statement = $this->conn->prepare($this->query);
        if ($data) {
            $this->statement->execute($data);
        } else {
            $this->statement->execute();
        }
    }

    function row_count()
    {
        return $this->statement->rowCount();
    }

    function statement_result()
    {
        return $this->statement->fetchAll();
    }

    function last_insert_id()
    {
        return $this->conn->lastInsertId();
    }

    function get_result()
    {
        return $this->conn->query($this->query, PDO::FETCH_ASSOC);
    }

    function is_login()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    function is_master_user()
    {
        if ($_SESSION["user_id"] == '53') {
            return true;
        }
        return false;
    }

    function is_committee($central = false)
    {
        if ($central) {
            $this->query = "SELECT admintype FROM central_committee WHERE form_id = '" . $_SESSION["user_id"] . "'";
        } else {
            $this->query = "SELECT admintype FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";
        }

        $this->execute();

        $result = $this->statement_result();

        if ($this->row_count() > 0) {
            foreach ($result as $row) {
                if ($row["admintype"] != '20' && $row["admintype"] != '24') {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    function is_ps($central = false)
    {
        if ($central) {
            $this->query = "SELECT admintype FROM central_committee WHERE form_id = '" . $_SESSION["user_id"] . "'";
        } else {
            $this->query = "SELECT admintype FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";
        }

        $this->execute();

        $result = $this->statement_result();

        if ($this->row_count() > 0) {
            foreach ($result as $row) {
                if ($row["admintype"] == '9' || $row["admintype"] == '10') {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    function is_offices($central = false)
    {
        if ($central) {
            $this->query = "SELECT admintype FROM central_committee WHERE form_id = '" . $_SESSION["user_id"] . "'";
        } else {
            $this->query = "SELECT admintype FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";
        }

        $this->execute();

        $result = $this->statement_result();

        if ($this->row_count() > 0) {
            foreach ($result as $row) {
                if ($row["admintype"] == '8') {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    function is_financials($central = false)
    {
        if ($central) {
            $this->query = "SELECT admintype FROM central_committee WHERE form_id = '" . $_SESSION["user_id"] . "'";
        } else {
            $this->query = "SELECT admintype FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";
        }

        $this->execute();

        $result = $this->statement_result();

        if ($this->row_count() > 0) {
            foreach ($result as $row) {
                if ($row["admintype"] == '6' || $row["admintype"] == '7') {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    function is_os($central = false)
    {
        if ($central) {
            $this->query = "SELECT admintype FROM central_committee WHERE form_id = '" . $_SESSION["user_id"] . "'";
        } else {
            $this->query = "SELECT admintype FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";
        }

        $this->execute();

        $result = $this->statement_result();

        if ($this->row_count() > 0) {
            foreach ($result as $row) {
                if ($row["admintype"] == '11' || $row["admintype"] == '12') {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    function is_gs($central = false)
    {
        if ($central) {
            $this->query = "SELECT admintype FROM central_committee WHERE form_id = '" . $_SESSION["user_id"] . "'";
        } else {
            $this->query = "SELECT admintype FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";
        }

        $this->execute();

        $result = $this->statement_result();

        if ($this->row_count() > 0) {
            foreach ($result as $row) {
                if ($row["admintype"] == '4' || $row["admintype"] == '5') {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    function is_pres($central = false)
    {
        if ($central) {
            $this->query = "SELECT admintype FROM central_committee WHERE form_id = '" . $_SESSION["user_id"] . "'";
        } else {
            $this->query = "SELECT admintype FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";
        }

        $this->execute();

        $result = $this->statement_result();

        if ($this->row_count() > 0) {
            foreach ($result as $row) {
                if ($row["admintype"] == '1' || $row["admintype"] == '2' || $row["admintype"] == '3') {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    function is_ecom()
    {
        $this->query = "SELECT admintype FROM central_committee WHERE form_id = '" . $_SESSION["user_id"] . "' AND admintype IN (1,4,24)";

        $this->execute();

        if ($this->row_count() > 0) {
            return true;
        }
        return false;
    }

    function is_renewed()
    {
        $this->query = "SELECT expiry_date FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";

        $this->execute();

        $result = $this->get_result();

        foreach ($result as $row) {
            $givenDate = $row["expiry_date"];
            $currentDate = date("Y-m-d");

            $givenDateTime = new DateTime($givenDate);
            $currentDateTime = new DateTime($currentDate);

            $interval = $currentDateTime->diff($givenDateTime);
        }

        if ($givenDateTime > $currentDateTime) {
            return true;
        } else {
            return false;
        }
    }

    function weekly_member_fetch()
    {
        $this->query = "SELECT * FROM fill_form WHERE mtime BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE() ORDER BY mtime DESC";
        $this->execute();
        $result = $this->get_result();
        if ($this->row_count() > 0) {
            foreach ($result as $row) {
                $rmc = $row["rmc"];
                $this->query = "SELECT * FROM fill_form WHERE rc='$rmc'";
                $this->execute();
                $result2 = $this->get_result();
                foreach ($result2 as $row2) {
                }
                echo '
                    <li class="media my-0">
                        <img src="' . $row["photo"] . '" class="mr-3 rounded-circle" width="45" height="45">
                        <div class="media-body">
                          <div class="media-title"><a href="profile_overview.php?form_id=' . $row["form_id"] . '&&status=view" class="text-decoration-none text-dark">' . $row["firstname"] . ' ' . $row["lastname"] . '</a></div>
                          <div class="text-small text-muted">Batch: ' . $row["batch"] . ', Refered By: ' . $row2["firstname"] . ' ' . $row2["lastname"] . ' (' . $row2["batch"] . ')</div>
                        </div>
                    </li>
                    <hr class="mt-1 mb-2">
                ';
            }
        } else {
            echo '<div class="text-center">No new member in this week!</div>';
        }
    }

    function weekly_new_member_count()
    {
        $this->query = "SELECT * FROM fill_form WHERE mtime BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()";
        $this->execute();
        $total = '';
        if ($this->row_count() > 0) {
            $total = $this->row_count();
        } else {
            $total = '0';
        }
        return $total;
    }

    function fetch_user_batch()
    {
        $this->query = "SELECT batch FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";

        $this->execute();

        $result = $this->statement_result();

        foreach ($result as $row) {
            return $row["batch"];
        }
    }

    function total_batch()
    {
        $this->query = "SELECT * FROM batch WHERE batch_status = 'enable'";
        $this->execute();
        return $this->row_count();
    }

    function total_batches()
    {
        $this->query = "SELECT * FROM batch";
        $this->execute();
        return $this->row_count();
    }

    function clean_input($string)
    {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    function fetch_batches($enable = true)
    {
        if ($enable) {
            $this->query = "SELECT * FROM batch WHERE batch_status = 'enable' ORDER BY batch ASC";
        } else {
            $this->query = "SELECT * FROM batch ORDER BY batch ASC";
        }
        $output = '';
        $result = $this->get_result();
        foreach ($result as $row) {
            $output .= '<option value="' . $row["batch"] . '">20' . $row["batch"] . '</option>';
        }
        return $output;
    }

    function fetch_rank()
    {
        $output = '';
        $this->query = "SELECT * FROM admin";
        $result = $this->get_result();
        foreach ($result as $row) {
            $output .= '<option value="' . $row["admintype"] . '">' . $row["rank_en"] . '</option>';
        }
        return $output;
    }

    function color_generate()
    {
        $red = rand(0, 255);
        $green = rand(0, 255);
        $blue = rand(0, 255);

        // Format the RGB values into a color code
        $colorCode = sprintf("%02x%02x%02x", $red, $green, $blue);

        return $colorCode;
    }

    function monthly_total_earning()
    {
        $output = '';

        $this->query = "SELECT sum(amount) as total FROM payment WHERE EXTRACT(YEAR FROM payment_received) = EXTRACT(YEAR FROM CURRENT_DATE) AND EXTRACT(MONTH FROM payment_received) = EXTRACT(MONTH FROM CURRENT_DATE) AND payment_status = 1";
        $result = $this->get_result();
        foreach ($result as $row) {
            if ($row["total"] == null) {
                $output = 0;
            } else {
                $output = $row["total"];
            }
        }
        return $output;
    }

    function birthday()
    {
        $this->query = "SELECT * FROM fill_form";
        $this->execute();
        $found = false;
        $result = $this->get_result();
        foreach ($result as $row) {
            if ($row["dob"] != null) {
                $date = strtotime($row["dob"]);
                if ((date("d") == date("d", $date)) && (date("m") == date("m", $date))) {
                    $found = true;
                    echo '
                    <li class="media">
                        <div class="d-flex">
                            <div class="position-relative me-3">
                                <img src="' . $row["photo"] . '" width="60" height="60" class="img rounded">
                                <img src="img/cake.jpg" class="img rounded-circle position-absolute" style="width: 30px; height: 30px; right:-10px; bottom:-10px;">
                            </div>
                            <div class="details">
                                <div class="fw-bold">' . $row["firstname"] . ' ' . $row["lastname"] . '</div>
                                <div class="text-small text-muted">Batch: ' . $row["batch"] . '</div>
                            </div>
                        </div>
                    </li>
                    ';
                }
            }
        }
        if (!$found) {
            echo '<div class="text-center">No Birthday Today!</div>';
        }
    }

    function fetch_sign($admintype)
    {
        $this->query = "SELECT central_committee.*, fill_form.sign FROM fill_form INNER JOIN central_committee ON central_committee.form_id = fill_form.form_id WHERE central_committee.admintype = '$admintype'";

        $this->execute();

        $result = $this->get_result();

        foreach ($result as $row) {
            return $row["sign"];
        }
    }

    function batch_active()
    {
        $this->query = "SELECT * FROM fill_form INNER JOIN batch ON batch.batch = fill_form.batch WHERE batch.batch_status = 'enable' AND fill_form.form_id = '" . $_SESSION["user_id"] . "'";

        $this->execute();

        if ($this->row_count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // function fetch_referred_members() 
    // {
    //     $this->query = "SELECT * FROM fill_form WHERE form_id = '".$_SESSION["user_id"]."'";

    //     $this->execute();

    //     $result = $this->get_result();

    //     foreach($result as $row)
    //     {
    //         $rc = $row["rc"];

    //         $this->query = "SELECT batch.*, fill_form.* FROM fill_form INNER JOIN batch ON fill_form.batch = batch.batch WHERE rmc = '$rc' AND form_id <> '".$row["form_id"]."' ORDER BY fill_form.batch ASC, mtime DESC";

    //         $this->execute();

    //         $result2 = $this->get_result();

    //         if($this->row_count() > 0)
    //         {
    //             foreach($result2 as $row2)
    //             {
    //                 echo '
    //                     <li class="media my-0">
    //                         <div class="position-relative" style="width: 60px;">
    //                             <img class="img rounded-circle" style="width: 52px !important; height: 52px !important;" src="'.$row2["photo"].'">
    //                             <div class="rounded-circle text-white text-center fw-bold d-flex justify-content-center align-items-center position-absolute border border-white" style="font-family: myfont; font-size: 14px; width: 25px; height: 25px; background-color:#'.$row2["color_code"].' !important; z-index: 10; right: -2px; bottom: -2px;">'.$row2["batch"].'</div>
    //                         </div>
    //                         <div class="media-body ms-3">
    //                           <div class="media-title" style="font-size: 18px;">'.$row2["firstname"].' '.$row2["lastname"].'</div>
    //                           <div class="text-small text-muted">Address: '.$row2["addr1"].'</div>
    //                         </div>
    //                     </li>
    //                     <hr class="mt-1 mb-2">
    //                 ';
    //             }
    //         }
    //         else
    //         {
    //             echo '<div class="text-center">No referred member!</div>';
    //         }
    //     }

    // }

    function fetch_referral_code()
    {
        $this->query = "SELECT * FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";

        $this->execute();

        $result = $this->get_result();

        foreach ($result as $row) {
            return $row["rc"];
        }
    }

    function fetch_fee_data($month)
    {
        $year = date('Y');

        $month_year = ucfirst($month) . ' ' . $year;

        $this->query = "SELECT mtime FROM fill_form WHERE form_id = '" . $_SESSION["user_id"] . "'";

        $this->execute();

        $result = $this->get_result();

        $joining_date = '';

        foreach ($result as $row) {
            $joining_date = $row["mtime"];
        }

        $joining_date = strtotime($joining_date);

        $given_month_date = strtotime("1 $month_year");

        if ($given_month_date < $joining_date) {
            return -1; // Not allowed: the given month is before the joining date
        }

        $given_month = date('n', strtotime($month_year));

        if ($given_month >= date('n')) {
            $this->query = "SELECT * FROM payment WHERE form_id = '" . $_SESSION["user_id"] . "' AND month = '$month' AND year = '$year'";

            $this->execute();

            $result = $this->get_result();

            if ($this->row_count() == 0) {
                $this->query = "SELECT * FROM support WHERE form_id = '" . $_SESSION["user_id"] . "' AND month = '$month' AND year = '$year'";

                $this->execute();

                if ($this->row_count() > 0) {
                    return 4; // considered
                } else {
                    return 2; // not confirmed
                }
            } else {
                foreach ($result as $row) {
                    if ($row["payment_status"] == 1) {
                        return 1; // paid
                    } else {
                        return 3; // submitted for review
                    }
                }
            }
        } else {
            $this->query = "SELECT * FROM payment WHERE form_id = '" . $_SESSION["user_id"] . "' AND month = '$month' AND year = '$year' AND payment_status = 1";

            $this->execute();

            if ($this->row_count() > 0) {
                return 1; // paid
            } else {
                $this->query = "SELECT * FROM support WHERE form_id = '" . $_SESSION["user_id"] . "' AND month = '$month' AND year = '$year'";

                $this->execute();

                if ($this->row_count() > 0) {
                    return 4; // considered
                } else {
                    return 0; // not paid
                }
            }
        }
    }

    function weekly_payment_count()
    {
        $this->query = "SELECT * FROM payment WHERE payment_received BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()";

        $this->execute();

        return $this->row_count();
    }

    function total_monthly_fee_batch($month, $year, $batch, $all)
    {
        if ($all == true) {
            $this->query = "SELECT sum(amount) as total FROM payment WHERE month = '$month' AND year = '$year' AND payment_status = 1";
        } else {
            $this->query = "SELECT sum(amount) as total FROM payment INNER JOIN fill_form ON fill_form.form_id = payment.form_id WHERE payment.month = '$month' AND payment.year = '$year' AND (fill_form.batch = '$batch' OR fill_form.form_id IN (SELECT form_id FROM member_assign WHERE batch = '$batch')) AND payment.payment_status = 1";
        }

        $this->execute();

        $result = $this->get_result();

        foreach ($result as $row) {
            if ($row["total"] == null) {
                return 0;
            } else {
                return $row["total"];
            }
        }
    }

    function count_total_paid($batch, $month, $year)
    {
        $this->query = "SELECT * FROM payment INNER JOIN fill_form ON fill_form.form_id = payment.form_id WHERE fill_form.batch = '$batch' AND payment.month = '$month' AND payment.year = '$year' AND payment.payment_status = 1";

        $this->execute();

        return $this->row_count();
    }

    function count_total_unpaid($batch, $month, $year)
    {
        $this->query = "SELECT * FROM fill_form WHERE batch = '$batch' AND form_id NOT IN (SELECT form_id FROM payment WHERE payment_status = 1 AND month = '$month' AND year = '$year') AND expiry_date > CURDATE()";

        $this->execute();

        return $this->row_count();
    }

    function fee_compare($batch, $month, $year)
    {
        $previous_month = date('F', strtotime($month . ' ' . $year . ' -1 month'));

        $previous_month_fee = $this->total_monthly_fee_batch($previous_month, $year, $batch, false);

        $current_month_fee = $this->total_monthly_fee_batch($month, $year, $batch, false);

        if ($previous_month_fee == $current_month_fee) {
            return '<i class="fa-solid fa-thumbs-up fa-beat-fade text-primary"></i>';
        } else if ($previous_month_fee < $current_month_fee) {
            return '<i class="fa-solid fa-angles-up fa-beat-fade text-success"></i>';
        } else {
            return '<i class="fa-solid fa-angles-down fa-beat-fade text-danger"></i>';
        }
    }

    function total_member($batch, $active)
    {
        if ($active) {
            $this->query = "SELECT * FROM fill_form WHERE batch = '$batch' AND expiry_date >= CURDATE()";
        } else {
            $this->query = "SELECT * FROM fill_form WHERE batch = '$batch'";
        }

        $this->execute();

        return $this->row_count();
    }

    function assigned($form_id)
    {
        $this->query = "SELECT * FROM member_assign WHERE form_id = '$form_id'";

        $this->execute();

        if ($this->row_count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function fetch_bangla_date($dateString, $format)
    {

        $date = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);

        $formatter = new IntlDateFormatter(
            'bn_BD', // Locale for Bengali (Bangla)
            IntlDateFormatter::FULL, // We want full details including month names
            IntlDateFormatter::FULL, // We don't need time details
            null, // Timezone
            IntlDateFormatter::TRADITIONAL, // Traditional calendar
            $format // Pattern for day, month (full name), year
        );

        $formattedDate = $formatter->format($date);

        return $formattedDate;
    }

    function create_certificate($id)
    {
        require("pdf/fpdf.php");

        $query = '';
        $query = "SELECT * FROM fill_form WHERE form_id = '$id'";
        $this->query = $query;
        $this->execute();
        $result = $this->get_result();
        foreach ($result as $row) {
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $sscschool = $row["sscschool1"];
            $addr = $row["addr1"];
            $batch = $row["batch"];
            $rc = $row["rc"];
            $photo = $row["photo"];
            $expiry_date = $row["expiry_date"];
            $date = new DateTime($expiry_date);
            $expiry_date = $date->format('d M Y');

            $this->query = "SELECT sign FROM fill_form WHERE form_id = '" . $row["created_by"] . "'";

            $this->execute();

            $result2 = $this->get_result();

            foreach ($result2 as $row2) {
                $registerer = $row2["sign"];
            }
        }

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont("Arial", "B", 18);
        $pdf->SetTextColor(255, 136, 0);
        $pdf->Cell(0, 5, "Save A Smile Foundation", 0, 1, "C");
        $pdf->SetFont("Arial", "U", 15);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, "Membership Certification", 0, 1, "C");
        $pdf->SetFont("Arial", "", 14);
        $pdf->Cell(35, 8, "Name", 0, 0);
        $pdf->SetFont("Arial", "B", 14);
        $pdf->Cell(50, 8, ": {$firstname} {$lastname}", 0, 1);
        $pdf->SetFont("Arial", "", 14);
        $pdf->Cell(35, 8, "SSC Batch", 0, 0);
        $pdf->SetFont("Arial", "B", 14);
        $pdf->Cell(7, 8, ": {$batch}", 0, 1);
        $pdf->SetFont("Arial", "", 14);
        $pdf->Cell(35, 8, "School", 0, 0);
        $pdf->SetFont("Arial", "B", 14);
        $pdf->Cell(40, 8, ": {$sscschool}", 0, 1);
        $pdf->SetFont("Arial", "", 14);
        $pdf->Cell(35, 8, "Address", 0, 0);
        $pdf->SetFont("Arial", "B", 14);
        $pdf->Cell(40, 8, ": {$addr}", 0, 1);
        // $pdf->MultiCell(120,7,": District: Khagrachari; Thana: Khagrachari Sadar; Union/Ward: Ward No-1, Khagrachari Municipality; Area: Narankhaiya; House No: 662;",0,"J");
        $pdf->SetFont("Arial", "", 13);
        $pdf->MultiCell(0, 7, "from now is a regular member of Save A Smile Foundation. He/She is requested to abide by all the rules and try to help with his/her best for the welfare of the org. and humanity.", 0, "J");
        $pdf->image("{$photo}", 168, 20, 30, 30);
        $pdf->image("img/seal.png", 155, 20, 25);
        $pdf->image("img/logo222.png", 11, 7, 15);
        $pdf->image("{$this->fetch_sign(8)}", 15, 89, 35);
        $pdf->image("{$this->fetch_sign(1)}", 168, 83, 35);
        $pdf->image("{$registerer}", 87, 85, 40);
        $pdf->Cell(40, 10, "Reference Code :", 0, 0);
        $pdf->SetFont("Arial", "B", 14);
        $pdf->SetTextColor(250, 0, 0);
        $pdf->Cell(35, 10, "{$rc}", 0, 1);
        $pdf->SetFont("Arial", "", 13);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(30, 7, "Expiry Date : ", 0, 0);
        $pdf->SetFont("Arial", "B", 13);
        $pdf->Cell(50, 7, "{$expiry_date}", 0, 1);
        $pdf->Cell(50, 7, "", 0, 1);
        $pdf->SetFont("Arial", "", 14);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(85, 10, "Office Secretary", 0, 0);
        $pdf->Cell(80, 10, "Registerer", 0, 0);
        $pdf->Cell(30, 10, "President", 0, 0);
        $pdf->output("F", "{$firstname} {$lastname}.pdf");
    }

    function create_fee_receipt($id, $month)
    {
        require("pdf/fpdf.php");

        include('num_to_word.php');

        $this->query = "SELECT * FROM fill_form WHERE form_id = '$id'";

        $this->execute();

        $result = $this->get_result();

        foreach ($result as $row) {
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $batch = $row["batch"];
        }

        $display_batch = $batch;

        $this->query = "SELECT * FROM payment WHERE form_id = '$id' AND month = '$month' AND payment_status = 1";

        $this->execute();

        $result2 = $this->get_result();

        foreach ($result2 as $row2) {
            $mobile = $row2["mobileno"];
            $mob = base64_decode($mobile);
            $mob1 = base64_decode($mob);
            $mob2 = base64_decode($mob1);
            if ($row2["mobileno"] == '') {
                $mob2 = 'N/A';
            }
            $amount = $row2["amount"];
            $payment_type = ucfirst($row2["payment_type"]);
            $payment_received = $row2["payment_received"];
            $qr_code = $row2["qr_code"];
            if ($row2["is_central"] == '1') {
                $batch = 'Central';
            }
        }

        $amount_in_words = numberToWord($amount);

        $date = new DateTime($payment_received);
        $payment_received = $date->format('d M Y h:i A');

        $month = ucfirst($month);

        if ($batch == 'Central') {
            $this->query = "SELECT central_committee.*, fill_form.sign FROM central_committee INNER JOIN fill_form ON central_committee.form_id = fill_form.form_id WHERE central_committee.admintype = '6'";
            $object->execute();
        } else {
            $this->query = "SELECT * FROM fill_form WHERE admintype='6' AND batch = '$batch'";
            $this->execute();
        }

        $result3 = $this->get_result();
        foreach ($result3 as $row3) {
            $sign = $row3["sign"];
        }

        $pdf = new FPDF();
        $pdf->SetTopMargin(20);
        $pdf->SetLeftMargin(15);
        $pdf->SetRightMargin(15);
        $pdf->AddPage();
        $pdf->SetFont("Arial", "B", 18);
        $pdf->SetTextColor(255, 136, 0);
        $pdf->Cell(0, 5, "Save A Smile Foundation", 0, 1, "C");
        $pdf->SetFont("Arial", "", 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, "Khagrachari Sadar, Khagrachari", 0, 1, "C");
        $pdf->SetFont("Arial", "U", 15);
        $pdf->SetFont("Arial", "BU", 15);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, "Fee Receipt", 0, 1, "C");
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(35, 8, "Name", 0, 0);
        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(50, 8, ": {$firstname} {$lastname}", 0, 1);
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(35, 8, "SSC Batch", 0, 0);
        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(7, 8, ": {$display_batch}", 0, 1);
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(35, 8, "Date Receipt", 0, 0);
        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(50, 8, ": {$payment_received}", 0, 1);
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(35, 8, "Payment Type", 0, 0);
        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(50, 8, ": {$payment_type}", 0, 1);
        if ($payment_type != 'cash') {
            $pdf->SetFont("Arial", "", 12);
            $pdf->Cell(35, 8, "Mobile No", 0, 0);
            $pdf->SetFont("Arial", "B", 12);
            $pdf->Cell(50, 8, ": {$mob2}", 0, 1);
        }
        $pdf->Cell(0, 3, "", 0, 1);
        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(20, 8, "SL", 1, 0, "C");
        $pdf->Cell(110, 8, "Details", 1, 0, "C");
        $pdf->Cell(50, 8, "Amount", 1, 1, "C");
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(20, 8, "1.", 1, 0, "C");
        $pdf->Cell(30, 8, "  Monthly Fee:", "TBL", 0);
        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(80, 8, "{$month}", "TBR", 0);
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(50, 8, "{$amount}", 1, 1, "C");
        $pdf->Cell(20, 8, "2.", 1, 0, "C");
        $pdf->Cell(110, 8, "  Entry Fee", 1, 0);
        $pdf->Cell(50, 8, "", 1, 1, "C");
        $pdf->Cell(20, 8, "3.", 1, 0, "C");
        $pdf->Cell(110, 8, "  One Time Grant", 1, 0);
        $pdf->Cell(50, 8, "", 1, 1, "C");
        $pdf->Cell(20, 8, "4.", 1, 0, "C");
        $pdf->Cell(110, 8, "  Emergency Grant", 1, 0);
        $pdf->Cell(50, 8, "", 1, 1, "C");
        $pdf->Cell(130, 8, "Grand Total:  ", 1, 0, "R");
        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(50, 8, "{$amount}", 1, 1, "C");
        $pdf->SetFont("Arial", "", 12);
        $pdf->Cell(25, 8, "In Words: ", 0, 0);
        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(50, 8, "{$amount_in_words} Only", 0, 1);
        $pdf->Cell(0, 5, "", 0, 1);
        $pdf->MultiCell(0, 7, "Your donation has been received successfully!! This will help to make a better tomorrow. Best wishes to you.", 0, "J");
        $pdf->Cell(0, 15, "", 0, 1);
        $pdf->Cell(170, 8, "Financial Secretary ({$batch})", 0, 1, "R");
        $pdf->SetFont("Arial", "", 10);
        $pdf->Cell(0, 15, "**This fee receipt is automatically generated by the SAS Management System**", 0, 0, "C");
        $pdf->image("img/logo222.png", 15, 20, 15);
        $pdf->image("{$sign}", 135, 165, 45);
        $pdf->image("img/received-rubber-stamp.png", 60, 85, 80);
        $pdf->image("{$qr_code}", 167, 45, 30);
        $pdf->output("F", "{$firstname}_{$lastname}_{$month}_Fee_Receipt.pdf");
    }

    function fetch_last_notice_serial_no($type)
    {
        $this->query = "SELECT MAX(serial_no) as serial_no FROM notice WHERE notice_type = '$type'";

        $this->execute();

        $result = $this->get_result();

        foreach ($result as $row) {
            return $row["serial_no"];
        }
    }

    function fetch_admintype($election_id, $only_rank)
    {
        $this->query = "SELECT * FROM elections WHERE election_id = '$election_id'";

        $this->execute();

        $result = $this->get_result();

        $ranks = '';

        foreach ($result as $row) {
            $batch = $row["batch"];

            if ($this->total_member($batch, true) < 30) {
                $this->query = "SELECT * FROM admin WHERE admintype IN (1,4,6,8,9) ORDER BY admintype ASC";
            } else if ($this->total_member($batch, true) < 50) {
                $this->query = "SELECT * FROM admin WHERE admintype IN (1,2,3,4,6,8,9,11) ORDER BY admintype ASC";
            } else {
                $this->query = "SELECT * FROM admin WHERE admintype NOT IN (0,20,21,22,24) ORDER BY admintype ASC";
            }
            $result2 = $this->get_result();

            if ($only_rank) {
                $i = 1;
                foreach ($result2 as $row2) {
                    $ranks .= '<p>' . $this->convertToBengaliNumbers($i++) . '। ' . $row2["rank"] . '</p>';
                }
            } else {
                foreach ($result2 as $row2) {
                    $ranks .= '<option value="' . $row2["admintype"] . '">' . $row2["rank_en"] . ' (' . $row2["rank"] . ')</option>';
                }
            }
        }
        return $ranks;
    }

    function already_voted($election_id)
    {
        $this->query = "SELECT * FROM votes WHERE form_id = '" . $_SESSION["user_id"] . "' AND election_id = '$election_id'";

        $this->execute();

        if ($this->row_count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function convertToBengaliNumbers($number)
    {
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bengaliNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

        return str_replace($englishNumbers, $bengaliNumbers, $number);
    }

    function fetch_next_notice_id($election_id, $after_serial)
    {
        $this->query = "SELECT * FROM notice WHERE notice_id = '$election_id' AND notice_type = 'গেজেট'";

        $result2 = $this->get_result();

        foreach ($result2 as $row2) {
            $serial_no = $row2["serial_no"] + ($after_serial);

            $this->query = "SELECT notice_id FROM notice WHERE serial_no = '$serial_no' AND notice_type = 'গেজেট'";

            $result3 = $this->get_result();

            foreach ($result3 as $row3) {
                return $row3["notice_id"];
            }
        }
    }
}
