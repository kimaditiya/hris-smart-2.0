<?php

namespace common\components;
use Yii;
use yii\base\Component;
use backend\sistem\models\Menu;


class MenuHelpers extends Component
{

    /**
        *getMenu
        *@param int $userId
        *@author wawan <aditiyakurniawan30@gmail.com>
        *@since 1.3.0
        *@return mixed
    **/
    public static function getMenu(int $userId) : array
    {
        $assigned = static::getAssignMenu($userId);
        $roots = Menu::find()->where(['id'=>$assigned,'lvl'=>0,'active'=>1])->roots()->all(); // get roots
        $result = [];
        $tree = []; 
        foreach ($roots as $n => $item) {
            $result = [
                'label' => $item['name'],
                'url' => static::parseRoute($item['route']),
                'lvl'=>$item['lvl'],
                'icon'=>$item['icon_menu_utama'],
                // 'active'=>true
            ];
            $tree[$n] = $result;
            $children = $item->children(1)->all();
            if($children){
                $tree[$n]['items'] = static::getMenuRecrusive($children);
            }

        }

        return $tree;
        
    }


    /**
        *getAssignMenu
        *@param int $userId
        *@author wawan <aditiyakurniawan30@gmail.com>
        *@return mixed
    */
    private static function getAssignMenu(int $userId) : array {
         /* @var $manager \yii\rbac\BaseManager */
        $manager = Yii::$app->getAuthManager();

        $routes = $filter1 = $filter2 = [];
            if ($userId !== null) {
                foreach ($manager->getPermissionsByUser($userId) as $name => $value) {
                    if ($name[0] === '/') {
                        if (substr($name, -2) === '/*') {
                            $name = substr($name, 0, -1);
                        }
                        $routes[] = $name;
                    }
                }
            }


            foreach ($manager->defaultRoles as $role) {
                foreach ($manager->getPermissionsByRole($role) as $name => $value) {
                    if ($name[0] === '/') {
                        if (substr($name, -2) === '/*') {
                            $name = substr($name, 0, -1);
                        }
                        $routes[] = $name;
                    }
                }
            }


        $routes = array_unique($routes);
            sort($routes);
            $prefix = '\\';
            foreach ($routes as $route) {
                if (strpos($route, $prefix) !== 0) {
                    if (substr($route, -1) === '/') {
                        $prefix = $route;
                        $filter1[] = $route . '%';
                    } else {
                        $filter2[] = $route;
                    }
                }
            }

        $assigned = [];
            $query = Menu::find()->select(['id'])->asArray();

            if (count($filter2)) {
                $assigned = $query->indexBy('id')->where(['route' => $filter2])->column();
            }
            if (count($filter1)) {
                $query->where('route like :filter');
                foreach ($filter1 as $filter) {
                    $assigned = array_merge($assigned, $query->params([':filter' => $filter])->column());
                }
            }

        return $assigned;

    }

    /**
        *getMenuRecrusive
        *@param array $children
        *@author wawan <aditiyakurniawan30@gmail.com>
        *@return mixed
    */

     private static function getMenuRecrusive(array $children) : array
    {
        $result = [];
        foreach($children as $i => $child) {
            if($child['active'] == 1){
                $category_r = [
                    'label'=>$child['name'],
                    'icon'=>$child['icon_menu_utama'],
                    'url'=>static::parseRoute($child['route']),
                    // 'active'=>true
                    ];      
            }else{
                $category_r = [];
            }
            $result[$i] = $category_r;
            $new_children = $child->children(1,2,3)->All();
                if($new_children) {
                    $result[$i]['items'] = static::getMenuRecrusive($new_children); // new children
                }           
            }
        return $result_items = $result;

    }

    
     /**
     * Parse route
     * @param  string $route
     * @return mixed
     */
    public static function parseRoute(string $route)
    {
        if (!empty($route)) {
            $url = [];
            $r = explode('&', $route);
            $url[0] = $r[0];
            unset($r[0]);
            foreach ($r as $part) {
                $part = explode('=', $part);
                $url[$part[0]] = $part[1] ?? '';
            }

            return $url;
        }

        return '#';
    }


}