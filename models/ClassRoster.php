<?php

namespace models;
use Exception;
use \PDO;

class ClassRoster
{
	protected $id;
	protected $class_code;
    protected $student_number;

    public function __construct($class_code, $student_number)
    {
        $this->class_code= $class_code;
		$this->student_number = $student_number;
    }
    public function getId()
	{
		return $this->id;
	}

	public function getClassCode()
	{
		return $this->class_code;
	}

	public function getStudentNumber()
	{
		return $this->student_number;
	}

    public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	//display Class Roster
    public function showClassRoster()
	{
		try {
			$sql = "SELECT c.id, c.name, c.description, c.class_code, t.first_name, t.last_name, (SELECT COUNT(student_number) FROM class_rosters AS r WHERE r.class_code = c.class_code) AS students_enrolled FROM classes AS c INNER JOIN teachers AS t ON c.teacher_id=t.employee_number";

            $data = $this->connection->query($sql)->fetchAll();
            return $data;
		}

		catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	//view Class Roster
	public function viewClassRoster($class_code)
	{
		try {
            $sql = "SELECT * FROM class_rosters INNER JOIN students on class_rosters.student_number=students.student_number WHERE class_code=:class_code";

            $statement = $this->connection->prepare($sql);
			$statement->execute([
				':class_code' => $class_code
			]);

            return $statement->fetchAll();

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	//add Class Roster
    public function addClassRoster()
	{
		try {
			$sql = "INSERT INTO class_rosters SET class_code=:class_code, student_number=:student_number";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':class_code' => $this->getClassCode(),
                ':student_number' => $this->getStudentNumber(),
			]);

			// $this->class_code = $class_code;
			// $this->student_number = $student_number;
			// $this->enrolled_at = $enrolled_at;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}

	//get Id
	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM class_rosters WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->class_code = $row['class_code'];
			$this->description = $row['description'];
			$this->enrolled_at = $row['enrolled_at'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	//delete Class Roster
    public function deleteClassRoster()
	{
		try {
			$sql = 'DELETE FROM class_rosters WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM class_rosters';
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
}