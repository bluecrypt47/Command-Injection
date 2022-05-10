Người thực hiện: Lê Trần Văn Chương.

Thời gian: 09/05/2022.

Mục lục:
- [Command Injection](#command-injection)
- [Back Connect](#back-connect)
- [Reverse Shell](#reverse-shell)

## Command Injection
- Command Injection là một cuộc tấn công trong đó mục tiêu là thực hiện các lệnh tùy ý trên hệ điều hành chủ thông qua một ứng dụng dễ bị tấn công. Các cuộc tấn công chèn lệnh có thể xảy ra khi một ứng dụng chuyển dữ liệu không an toàn do người dùng cung cấp (biểu mẫu, cookie, tiêu đề HTTP, v.v.) đến trình bao hệ thống. Trong cuộc tấn công này, các lệnh hệ điều hành do kẻ tấn công cung cấp thường được thực thi với các đặc quyền của ứng dụng dễ bị tấn công. Các cuộc tấn công chèn lệnh có thể xảy ra phần lớn do không đủ xác thực đầu vào.
- Ví dụ: 
    - Chức năng ping ip dưới đây.
    ![Hình 1.](~/../img/1.png)

    - Bây giờ, tôi sẽ thử chèn các command vào sau `localhost`. Đầu tiên, tôi sẽ thử dùng `; whoami` để xem thử nó có chạy không. Vì hiện lỗi, nên tôi tiếp tục chèn vào 1 lệnh khác `| whoami`, kết quả cũng ổn. Và tôi tiếp tục chèn các lệnh khác vào và kết quả như hình dưới.
    ![Hình 2.](~/../img/2.png)

## Back Connect


## Reverse Shell
