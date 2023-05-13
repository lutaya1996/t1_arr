



# Компьтерные сети
## DNS
 - Что такое домен

    https://skillbox.ru/media/marketing/chto-takoe-domen-kakim-on-dolzhen-byt-i-kak-ego-zaregistrirovat/

 - что такое DNS (какие есть DNS google and yandex)

   https://skillbox.ru/media/code/dns-chto-eto-takoe-i-kak-eye-ispolzuyut/

 - Алёна, нахуя нам нужен файлик hosts и где он лежит?

    *Когда пользователь вводит имя сайта в адресную строку браузера, компьютер сначала обращается к локальному файлу настроек DNS — файлу ***hosts***. В нём содержатся IP-адреса всех сайтов, на которые пользователь заходил с этого устройства. Если нужного адреса там нет, компьютер направляет запрос на локальный сервер интернет-провайдера пользователя.

 C:\Windows\system32\drivers\etc
 -определение имени(домен), по которому у нас будет доступен сервер(resolve)

# **HTTP 1.1**
 * **HTTP REQUEST**

 1) *Строка запроса* включает в себя метод, URL(полный/относит.), версию протокола HTTP:
 ~~~
   GET http://www.example.com/index.htm HTTP/1.1
 ~~~
   * Методы:
 
      * GET - не изменяет инф-ю на сервере(производится чтение)
      * HEAD
      * POST - измен-ся инф-я на сервере(создается новое)
      * PUT - измен-ся инф-я на сервере(изменение/замена уже сущ-го)
      * DELETE - удаление
      * CONNECT
      * OPTIONS
      * TRACE
      * PATCH

2) *Заголовки( Headers)* :

   * 1 строка - 1 заголовок

   * Существуют стандартные заголовки, можно создать свои пользовательские

User_agent: Mozilla/5.0(x11;Linux x86-64)

**Host: www.example.com** - обязательный заголовок

Accept-language: ru, en-US

Connection: keep-alive

/n - символ перевода строки

3) Тело : необязательно

   * Можно передать любые данные 

   * Если есть тело, то есть 2 заголовка:

      Content-type: application/x-www-form-urlencoded

      Content-length: 32

* **HTTP RESPONSE**

Все то же самое, что и в запросе, отличаются строки:

*Строка ответа(HTTP Response:status line):*

Версия HTTP-протокола, код состояния, текстовое содержание причины ответа:

~~~
HTTP/1.1 200 OK
~~~
# **HTTP/2**

https://youtu.be/SZHpnohrbIQ 

Изменяется способ упаковки и передачи данных запроса и ответа между клиентом и сервером.

Является бинарным протоколом, добавляется сжатие данных.

Появляется низкоуровневая сущность - frame(кадр)

Каждое сообщение состоит из 1/нескольких фреймов 

Структура фрейма(см. рисунок)

Существует 10 типов фреймов(см. таблицу)

Появляется stream(поток) - последовательность фреймов, имеющих одинаковый ID

Упрощается процесс формирования и разбора текста(жесткая структура фреймов)

Оптимизируется количество соединений между клиентом и сервером

Появляется возможность параллельного обмена несколькими сообщениями в рамках одного TCP/IP соединения - вместо создания нового соединения создается новый стрим

Мультиплексирование запросов — передача нескольких HTTP-запросов одним мультизапросом на сервер.   

Появляется возможность прервать ответ/запрос в любой момент без разрыва соединений

Установка приоритета стрима

Server push позволяет слать сообщения со стороны сервера в сторону клиента, не дожидаясь инициирования со стороны клиента.

