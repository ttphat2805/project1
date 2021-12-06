<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="tinh">Tinh/ Thanh pho</label>
            <select name="tinh" id="tinh" onchange="changeTinh()">
                <option value=""> chon tinh</option>
            </select>
        </div>
        <div>
            <label for="quan">Quan/Huyen</label>
            <select name="quan" id="quan" onchange="changeQuan()">
                <option value="">chọn quận</option>
            </select>
        </div>
        <div>
            <label for="phuong">Phường/xã</label>
            <select name="phuong" id="phuong">

            </select>
        </div>
    </form>

    <script>
       var tinh = document.getElementById("tinh");
       var quan = document.getElementById("quan");
       var xa = document.getElementById("phuong");
       var list_tinh = "";
       var list_quan = "";
       var list_phuong = "";
        var requests = new XMLHttpRequest();
        requests.open("GET", "https://provinces.open-api.vn/api/p/")
        requests.send();
        requests.onload = ()=>{
            let response = requests.response;
            response = JSON.parse(response);
            for(let i=0; i<Object.keys(response).length; i++){
                list_tinh +="<option value="+response[i].code+">"+response[i].name+"</option>";
            }
            tinh.innerHTML=list_tinh;
        }
        function changeTinh(){
            quan.innerHTML = "";           
            let request = new XMLHttpRequest();
            request.open("GET", "https://provinces.open-api.vn/api/p/"+tinh.value+"?depth=2");
            request.send();
            request.onload = ()=>{
                
                let response = request.response;
                response = JSON.parse(response);

                for(let i=0;i<response.districts.length; i++){
                                
                    let opt = document.createElement('option');
                    opt.value = response.districts[i].code;
                    opt.innerHTML = response.districts[i].name;
                    quan.append(opt);
                }
            }
            
        };

        function changeQuan ()  {
            
            xa.innerHTML = "";
            let request = new XMLHttpRequest();
            request.open("GET", "https://provinces.open-api.vn/api/d/"+quan.value+"?depth=2")
            request.send();
            request.onload = () => {
                let response = request.response;
                response = JSON.parse(response);
                for( let i=0; i< response.wards.length; i++){
                    
                    let opt = document.createElement('option');
                    opt.value = response.wards[i].code;
                    opt.innerHTML = response.wards[i].name;
                    xa.append(opt);
                }
            }
        }
    </script>
</body>
</html>