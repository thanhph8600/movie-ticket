<?php



echo '
    <div style="background-color: #ddd; padding:15px 20px">
    <p>Cảm ơn bạn đã mua vé của chúng tôi</p>
    <h2>Thông tin vé của bạn</h2>
    <h4>Tên phim: ' . $ticket['name'] . '</h4>
    <p>Giờ chiếu: ' . $ticket['time_start'] . ' - ' . $ticket['time_end'] . '</p>
    <p>Phòng chiếu: ' . $ticket['name_room'] . '</p>
    <p>Ngày chiếu: ' . format_date($ticket['date']) . '</p>

    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
        <tr>
            <td style="border: 1px solid black;text-align: left;padding: 8px;">Ghế:</td>
            <td style="border: 1px solid black;text-align: left;padding: 0 8px;display:flex;gap:10px;border:1px none none none">';
            foreach ($seat as $key => $value) {
                echo '<p>' . $value['row_index'] . $value['col_index'] . '</p>';
            }

            echo '</td>
            <td style="border: 1px solid black;text-align: left;padding: 8px;">' . currency_format($price_ticket) . '</td>
        </tr>';
if(count($bill) != 0){
    echo '
    <tr>
        <td rowspan="'. (count($bill) + 1).'" style="border: 1px solid black;text-align: left;padding: 8px;">Combo:</td>
    </tr>';
}
        
            foreach ($bill as $key => $value) {
                $beverages= Beverages::select_by_id($value['id_beverages']);
                echo '
                <tr>
                    <td style="border: 1px solid black;text-align: left;padding: 8px;">'.$value['quantity'].' x '.$beverages['name'].'</td>
                    <td style="border: 1px solid black;text-align: left;padding: 8px;">'.currency_format($value['quantity'] * $value['price']).'</td>
                </tr>';
            }


        echo ' <tr style="font-weight:bold">
        <td colspan="2" style="border: 1px solid black;text-align: left;padding: 8px;">Giảm giá</td>
        <td style="border: 1px solid black;text-align: left;padding: 8px;">' . currency_format($price_ticket * $discount['percent'] / 100) . '</td>
    </tr>
        <tr style="font-weight:bold">
            <td colspan="2" style="border: 1px solid black;text-align: left;padding: 8px;">Tổng</td>
            <td style="border: 1px solid black;text-align: left;padding: 8px;">' . currency_format($sum) . '</td>
        </tr>
    </table>
    <div style="padding: 15px 0px;display:inline-block">
        <img style="padding: 15px;background:white" src="https://api.qrserver.com/v1/create-qr-code/?data='.$ADMIN_URL.'/QR/?id_ticket='.$ticket['code'].'&amp;size=200x200" alt="" title="" />
        <p style="text-align: center;">'.$ticket['code'].'</p>
    </div>
    <p style="font-style:italic;">Hãy đưa mã này cho nhân viên</p>
</div>
    ';
