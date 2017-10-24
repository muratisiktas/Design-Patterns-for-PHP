# Design-Patterns-for-PHP
Tasarım Kalıpları ve PHP'de kullanım örnekleri

## Singleton Design Pattern
Uygulama geliştirirken en popüler tasarım desenlerinden biri tek nesne tasarım desenidir. Singleton tasarım deseni,  hazırlayacağımız sınıftan sadece bir örneğinin oluşturulmasını sağlar. Bu sayede nesnenin kopyalanmasını yada yeni bir tane oluşturmasını engeller ve nesneye ihtiyaç duyulduğunda o nesnenin daha önceden oluşturulan örneği çağırır.

Veritabanı bağlantılarında, port bağlantılarında yada dosya işlemleri gibi tek bir nesneye ihtiyaç duyduğumuz zamanlarda kullanırız.

### [PDO veritabanı bağlantısı](https://github.com/muratisiktas/Design-Patterns-for-PHP/blob/master/Singleton-Design-Pattern-PDO-Database-Connection.php) için Tek Nesne Tasarım Kalıbı(Deseni) kullanımı:
```php

if(!isset($db)) {
  $instance = Connection::getInstance();
  $db = $instance->getConnection();
}

/* Example */
class User
{
  public function getUserList(){
    global $db;

    $query = $db->query("SELECT * FROM users", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
       return $query;
    }

  }
  
}
```
