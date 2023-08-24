var array = document.querySelectorAll(".soluong")
for(var i = 0; i<array.length;i++){
    array[i].disabled = true
}

function display(){
    var arr = document.querySelectorAll('tr')
    for(var i = 0; i<arr.length-1;i++){
        arr[i].style.display=""
    }
}

function mucgia(){
    var mucgia = document.getElementById("mucgia").value
    var arr = document.querySelectorAll('tr')
    switch(mucgia){
        case '0':
            display()
            break
        case '1':
            display()
            for(var i = 0; i<arr.length-1;i++){
                if(parseInt(arr[i].children[2].textContent)>100){
                    arr[i].style.display="none"
                }
            }
            break
        case '2':
            display()
            for(var i = 0; i<arr.length-1;i++){
                if(parseInt(arr[i].children[2].textContent)>200){
                    arr[i].style.display="none"
                }
            }
            break
        case '3':
            display()
            for(var i = 0; i<arr.length-1;i++){
                if(parseInt(arr[i].children[2].textContent)>300){
                    arr[i].style.display="none"
                }
            }
            break
        case '4':
            display()
            for(var i = 0; i<arr.length-1;i++){
                if(parseInt(arr[i].children[2].textContent)>400){
                    arr[i].style.display="none"
                }
            }
            break
        case '5':
            display()
            for(var i = 0; i<arr.length-1;i++){
                if(parseInt(arr[i].children[2].textContent)>500){
                    arr[i].style.display="none"
                }
            }
            break
        case '6':
            display()
            for(var i = 0; i<arr.length-1;i++){
                if(parseInt(arr[i].children[2].textContent)>600){
                    arr[i].style.display="none"
                }
            }
            break
        case '7':
            display()
            for(var i = 0; i<arr.length-1;i++){
                if(parseInt(arr[i].children[2].textContent)>700){
                    arr[i].style.display="none"
                }
            }
            break
    }
}

function daott(obj){
    var row = obj.parentElement.parentElement;
    var input = row.getElementsByClassName("soluong")[0];
    if(obj.checked){
        thanhTien(row.children[3].children[0])
        input.disabled = false
    }else{
        input.disabled = true
        row.querySelector("#tong").innerText = 0
        tinhTong()
    }
}

// the "số lượng" input fields to prevent negative values
var soluongInputs = document.querySelectorAll('.soluong');
soluongInputs.forEach(function(input) {
    input.addEventListener('input', function() {
        var value = parseInt(this.value);
        if (isNaN(value) || value < 0) {
            this.value = 0;
        }
    });
});

function tinhTong(){
    var tong = 0;
    var arr = document.querySelectorAll('#tong')
    for(var i = 0; i<arr.length;i++){
        tong += parseInt(arr[i].textContent)
    }
    document.querySelector('#tongtien').innerText = tong
}

function thanhTien(obj){
    var soluong = obj.value
    var row = obj.parentElement.parentElement
    var dongia = row.children[2].innerText;
    var thanhtien = parseInt(soluong) * parseInt(dongia)
    row.querySelector("#tong").innerText = thanhtien
    tinhTong()
}

function chonhet(obj){
    var arr = document.querySelectorAll(".chon")
    if(obj.checked){
        for(var i = 0; i<arr.length;i++){
            arr[i].checked = true
            daott(arr[i])
        }
    }else{
        for(var i = 0; i<arr.length;i++){
            arr[i].checked = false
            daott(arr[i])
        }
    }
}