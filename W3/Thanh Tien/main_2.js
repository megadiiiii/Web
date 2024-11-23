function Result() {
    var result;
    a = parseInt(document.getElementById('num1').value) || 0;
    b = parseInt(document.getElementById('num2').value) || 0;
    result = a * b;
    document.getElementById('kq').innerHTML = result;
} 