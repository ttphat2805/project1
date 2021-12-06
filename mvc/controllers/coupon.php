<?php 
class coupon extends Controller {
    public function __construct()
    {
        $this->coupon = $this->model('couponmodels');
    }

    public function check() {
        $coupon_code = $_POST['coupon_code'];
        $total_bill = $_POST['total_bill'];
        $user_id = $_POST['user_id'];
        $output = 'success';
        if($this->coupon->findCoupon($coupon_code) == 0){
            $output = 'coupon này không tồn tại';
            $result = [
                'alert' => $output,
                'old_price' => $total_bill,
                'new_price' => $total_bill,
                'coupon' => ''
            ];
            $result = json_encode($result);
            echo $result;
            exit;
        }
        else {            
            $this_coupon = $this->coupon->getCoupon($coupon_code);
        }
        if ($total_bill < $this_coupon['min_order']) {
            $output = 'hóa đơn của bạn phải lớn hơn '.number_format($this_coupon['min_order']).'VNĐ';
        }
        elseif ($this_coupon['quantity'] == 0){
            $output = "mã giảm giá này đã hết lượt dùng";
        }
        elseif($this->coupon->checkCouponUser($user_id, $coupon_code) >0 ) {
            $output = 'bạn đã dùng coupon này rồi';
        }
        elseif($this_coupon['date_out'] < date('Y-m-d')) {
            $output = "coupon này đã hết hạn rồi";
        }
        else {
            $new_total = $total_bill - $this_coupon['discout'];
            if($new_total < 0) {
                $new_total = 5000;
            }
            $result = [
                'alert' => $output,
                'old_price' => $total_bill,
                'new_price' => $new_total,
                'coupon' => $this_coupon['id']
            ];
            $result = json_encode($result);
            echo $result;
            exit;
        
        }
        $result = [
            'alert' => $output,
            'old_price' => $total_bill,
            'new_price' => $total_bill,
            'coupon' => $this_coupon['id']
        ];
        $result = json_encode($result);
        echo $result;
        exit;
    }
}