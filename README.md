

## Настройки
### Пакеты

- [bkwld/croppa](https://github.com/BKWLD/croppa).


### Изменения


- Добавлен Telescop
- Добавлен объем упаковки, вес упаковки, досок в упаковке

### Структура сайта

- Типы продукции 
  - Типы продукции `/<type-slug>`
  - Тип продукции производителя `/<type-slug>/<firm-slug>`
  - Тип продукции производителя `/<type-slug>/<firm-slug>/<collection-slug>`
- Производители
  - Список `/manufactures`  
  - Производитель `/manufacture-<firm-slug>`
  - Тип продукции производителя `/<type-slug>/<firm-slug>`
  - Коллекция производителя `/<type-slug>/<firm-slug>/<collection-slug>/`
- Фильтры 
  - Поиск по атрибутам `/<type-slug>/variant/<attributeOption-slug>/`

### Команды
- /opt/php81/bin/php composer.phar require mews/captcha --ignore-platform-req=ext-bcmath


