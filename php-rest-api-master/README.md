# php-rest-api
php rest api scaffold

##Url Structure
http://localhost:8080/class/method/param_1/param_2/..../param_n

For e.g. http://localhost/application/index/foo/bar

##PDO Query Builder (by izniburak)
https://github.com/izniburak/PDOx/blob/master/DOCS.md

## GUMP Validator (by Wixel)
https://github.com/Wixel/GUMP

## Built in methods
- $this->success('Success Message',$data = array())
- $this->error('Error Message',$data = array())

Example:

```php
$this->success($message = 'Registered Successfully',$data = array('name' => 'Bruce Wayne'));
```

returns =>

```json
{
  "code": 200,
  "success": true,
  "msg": "Registered Successfully",
  "data": {
    "name": "Bruce Wayne"
  }
}
```
 