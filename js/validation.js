function subForm() {
    // 変数と正規表現の定義
    var name = document.getElementById("nameID").value;
    var ruby = document.getElementById("rubyID").value;
    var mail = document.getElementById("mailID").value;
    var mail_regex = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
    var tel = document.getElementById("telID").value;
    var tel_regex = /^0\d{9,10}$/;
    var dateofbirth = document.getElementById("dateofbirthId").value;
    var company = document.getElementById("companyID").value;

    var isRight = true;

    // 名前
    if (name == '') {
        document.getElementById('name_error_Id').innerHTML = "※必須です";
        isRight = false;
    } else if (name.length < 3) {
        document.getElementById('name_error_Id').innerHTML = "※3文字以上入力してください";
        isRight = false;
    } else {
        document.getElementById('name_error_Id').innerHTML = "";
    }

    // ふりがな
    if (ruby == '') {
        document.getElementById('ruby_error_Id').innerHTML = "※必須です";
        isRight = false;
    } else if (ruby.length < 3) {
        document.getElementById('ruby_error_Id').innerHTML = "※3文字以上入力してください";
        isRight = false;
    } else {
        document.getElementById('ruby_error_Id').innerHTML = "";
    }

     // メール
    if (mail == '') {
        document.getElementById('mail_error_Id').innerHTML = "※必須です";
        isRight = false;
    } else if (!mail_regex.test(mail)) {
        document.getElementById('mail_error_Id').innerHTML = "※xxx@xxx.xxxの形式のみ可";
        isRight = false;
    } else {
        document.getElementById('mail_error_Id').innerHTML = "";
    }

    //     // 電話番号
    if (tel == '') {
        document.getElementById('tel_error_Id').innerHTML = "※必須です";
        isRight = false;
    } else if (!tel_regex.test(tel)) {
        document.getElementById('tel_error_Id').innerHTML = "※ハイフンなし・9桁及び10桁で入力してください";
        isRight = false;
    } else {
        document.getElementById('tel_error_Id').innerHTML = "";
    }

    //     // 性別

    let gender = document.querySelector("input[name= gender]:checked");
    if (gender == null) {
        document.getElementById('gender_error_Id').innerHTML = "※必須です";
    }

    //     // 生年月日
    if (dateofbirth == '') {
        document.getElementById('dateofbirth_error_Id').innerHTML = "※必須です";
        isRight = false;
    } else {
        document.getElementById('dateofbirth_error_Id').innerHTML = "";
    }

    //     // 所属会社
    if (company == '') {
        document.getElementById('company_error_Id').innerHTML = "※必須です";
        isRight = false;
    } else {
        document.getElementById('company_error_Id').innerHTML = "";
    }

    if (isRight) {
        document.getElementById("resist-form").submit();
    }
}