<?php namespace Attendance\Models;

use Attendance\Database\AttendanceTable;

/**
 * 
 */
class Attendance extends Model {

  public static function create($pv = []) {
    return parent::_create(AttendanceTable::getInstance(), $pv);
  }

  public static function countOf($sub) {
    if ($sub == '') return 0;
    $where = sprintf("WHERE reg_no<>'marker' AND subject='%s' AND taken_on LIKE '%s'", $sub, date('Y-m-d') . '%');
    return count(self::select(["*"], $where));
  }

  public static function select($pv = [], $where) {
    return parent::_select(AttendanceTable::getInstance(), $pv, $where);
  }
  /**
   * Deletes a matching row from the table
   *
   *  delete(['age' => '=> 12', 'name' =>  '= ram']);
   *
   * @param $wheres array A collection of condition to meet for deleting the record
   *
   * @return boolean true if successfully deleted
   */
  public static function delete($wheres = []) {
    return parent::_delete(AttendanceTable::getInstance(), $wheres);
  }

}