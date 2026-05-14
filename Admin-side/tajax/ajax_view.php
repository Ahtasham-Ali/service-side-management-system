<?php
include('../connection.php');

$sql = "SELECT * FROM `technician` ORDER BY technician_id DESC";
$result = mysqli_query($conn, $sql);

$output = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        
        $status = $row['status']; 
        
        if($status == 'pending' || empty($status)){
            // Button for Pending (Green Approve)
            $status_btn = "<button class='btn btn-sm btn-success approve-btn' data-id='{$row['technician_id']}'>
                            <i class='fas fa-check'></i> Approve
                           </button>";
            $image_status = "<span class='badge badge-warning d-block mt-1'>Pending</span>";
        } else {
            // Button for Approved (Red Disapprove/Hide)
            $status_btn = "<button class='btn btn-sm btn-warning disapprove-btn' data-id='{$row['technician_id']}'>
                            <i class='fas fa-times'></i> Disapprove
                           </button>";
            $image_status = "<span class='badge badge-success d-block mt-1'>Approved</span>";
        }

        // Portfolio Images
        $port_imgs = explode(',', $row['portfolio_images']);
        $img_list = "";
        foreach ($port_imgs as $img) {
            if (!empty($img)) {
                $img_list .= '<img src="../uploads/technicians/'.trim($img).'" class="rounded border m-1" style="width: 30px; height: 30px; object-fit: cover;">';
            }
        }

        $output .= "<tr>
            <td>{$row['technician_id']}</td>
            <td class='text-center'>
                <img src='../uploads/technicians/{$row['profile_image']}' class='rounded-circle border' style='width: 45px; height: 45px; object-fit: cover;'>
                {$image_status}
            </td>
            <td>
                <strong>{$row['name']}</strong><br>
                <small>CNIC: {$row['t_cnic']}</small>
            </td>
            <td>
                <span class='badge badge-info'>{$row['skill']}</span><br>
                <small>Exp: {$row['experience']}</small>
            </td>
            <td><small>{$row['address']}</small></td>
            <td><b>Rs. " . number_format($row['service_charges']) . "</b></td>
            <td><div class='d-flex flex-wrap' style='max-width:120px;'>{$img_list}</div></td>
            <td>
                <div class='btn-group-vertical w-100'>
                    {$status_btn}
                    <button class='btn btn-sm btn-outline-danger delete-btn mt-1' data-id='{$row['technician_id']}'>
                        <i class='fas fa-trash'></i> Delete
                    </button>
                </div>
            </td>
        </tr>";
    }
} else {
    $output = "<tr><td colspan='8' class='text-center text-danger'>No Technicians Found!</td></tr>";
}

echo $output;
?>