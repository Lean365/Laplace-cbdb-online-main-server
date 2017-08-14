# cbdb-online-main-server

按照[旧版本录入系统](http://cbdb.fas.harvard.edu/cbdbc/cbdbedit)重构，技术选型Laravel + Mysql + Vuejs

采用[Laravel 5.4](https://laravel.com/docs/5.4)框架

### Database migrations

数据库配置文件在.env中

migration 是laravel提供的一个数据库迁移功能，可以方便的在新环境上迁移数据。

```bash
php artisan make:migration creat_tasks_table --create=tasks
```
参考文档[migrations](http://d.laravel-china.org/docs/5.4/migrations)

### 验证邮箱

laravel自带的邮箱服务对国内支持不太好，本项目倾向使用[sendcloud](https://github.com/NauxLiu/Laravel-SendCloud)服务

### 用户验证

执行如下命令，使用laravel自带的用户验证功能

```bash
php artisan make:auth
```

参考文档[authentication](http://d.laravel-china.org/docs/5.4/authentication)

### 信息提示 flash

网站的各种提示使用[flash](https://github.com/laracasts/flash)

### 表单验证

表单验证会是本项目的重点之一，保证用户提交的信息准确无误

参考文档[validation](http://d.laravel-china.org/docs/5.4/validation)

### Eloquent ORM

Laravel 的 Eloquent ORM 提供了漂亮、简洁的 ActiveRecord 实现来和数据库进行交互。每个数据库表都有一个对应的「模型」可用来跟数据表进行交互。你可以通过模型查询数据表内的数据，以及将记录添加到数据表中。

本项目的数据库操作都会采取这种方式。

参考文档[eloquent](http://d.laravel-china.org/docs/5.4/eloquent)

### 控制器

使用如下命令创建控制器

```bash
php artisan make:controller BiogBasicInformationController --resource
```

使用下面命令查看路由

```
php artisan route:list
```

创建验证Request
```
php artisan make:request BiogBasicInformationRequest
```


参考文档[controllers](http://d.laravel-china.org/docs/5.4/controllers)

### webpack打包

修改resource/assets/js/bootstrape和resource/assets/css/app.scss
执行npm run dev

<div class="text-center">{{ c_name_chn }} ({{ c_name }})</div>
                <div class="panel panel-default">
                    <div class="panel-heading">基本资料</div>

                    <div class="panel-body">
                        
                        <form action="/biogbasicinformation/{{ c_personid }}" method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="c_persionid">person id</label>
                                <input type="text" name="c_personid" class="form-control" value="{{ c_personid }}" disabled>
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('c_surname_chn') ? ' has-error' : '' }}">
                                <label for="c_surname_chn">姓</label>
                                <div class="form-group">
                                    <input type="text" name="c_surname_chn" class="form-control" value="{{ old('c_surname_chn') ? old('c_surname_chn') : c_surname_chn }}">
                                    @if ($errors->has('c_surname_chn'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('c_surname_chn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_surname">Xing</label>
                                <div class="form-group">
                                    <input type="text" name="c_surname" class="form-control" value="{{ c_surname }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_mingzi_chn">名</label>
                                <input type="text" name="c_mingzi_chn" class="form-control" value="{{ c_mingzi_chn }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_mingzi">Ming</label>
                                <input type="text" name="c_mingzi" class="form-control" value="{{ c_mingzi }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_surname_proper">外文姓</label>
                                <div class="form-group">
                                    <input type="text" name="c_surname_proper" class="form-control" value="{{ c_surname_proper }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_mingzi_proper">外文名</label>
                                <div class="form-group">
                                    <input type="text" name="c_mingzi_proper" class="form-control" value="{{ c_mingzi_proper }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_surname_rm">外文Xing(羅馬字)</label>
                                <div class="form-group">
                                    <input type="text" name="c_surname_rm" class="form-control" value="{{ c_surname_rm }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_mingzi_rm">外文Ming(羅馬字)</label>
                                <div class="form-group">
                                    <input type="text" name="c_mingzi_rm" class="form-control" value="{{ c_mingzi_rm }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">姓名(中)</label>
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" value="{{ c_name_chn }}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">姓名(英)</label>
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" value="{{ c_name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_name_proper">外文全名</label>
                                <div class="form-group">
                                    <input type="text" name="c_name_proper" class="form-control" value="{{ c_name_proper }}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_name_rm">外文XingMing</label>
                                <div class="form-group">
                                    <input type="text" name="c_name_rm" class="form-control" value="{{ c_name_rm }}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_female">性别（原female）</label>
                                <select class="form-control">
                                    <option>0-男</option>
                                    <option>1-女</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary pull-right" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>