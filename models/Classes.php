<?php

namespace models;
use \PDO;

class Classes
{
    protected $id;
    protected $name;
	protected $description;
	protected $class_code;
	protected $teacher_id;


    public function __construct($name, $description, $class_code, $teacher_id)
    {
        $this->name = $name;
		$this->description = $description;
		$this->class_code = $class_code;
		$this->teacher_id = $teacher_id;
    }
    public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getClassCode()
	{
		return $this->class_code;
	}

	public function getTeacherId()
	{
		return $this->teacher_id;
	}

    public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	//add classes
    public function saveClasses()
	{
		try {
			$sql = "INSERT INTO classes SET name=:name, description=:description, class_code=:class_code, teacher_id=:teacher_id";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':description' => $this->getDescription(),
				':class_code' => $this->getClassCode(),
				':teacher_id' => $this->getTeacherId(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function showClasses()
    {
        try {
            $sql = "SELECT * FROM classes INNER JOIN teachers on classes.teacher_id=teachers.teacher_id";
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM classes WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->description = $row['description'];
			$this->class_code = $row['class_code'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

    public function updateClasses($name, $description, $code, $teacher_id)
	{
		try {
			$sql = 'UPDATE classes SET name=?, description=?, class_code=?, teacher_id=? WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$name,
                $description,
                $code,
				$teacher_id,
                $this->getId()

			]);
			$this->name = $name;
			$this->description = $description;
			$this->teacher_id = $teacher_id;
			$this->code = $code;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}

	public function displayClassRoster($id){
		try {
            $sql = "SELECT classes.id, classes.class_code FROM classes WHERE id=:id";
            $statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);
            return $statement->fetch();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
	}

    public function deleteClasses()
	{
		try {
			$sql = 'DELETE FROM classes WHERE id=?';
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
            $sql = 'SELECT classes.id, classes.name, classes.description, classes.class_code, teachers.first_name, teachers.last_name FROM classes JOIN teachers on classes.teacher_id=teachers.employee_number'; 
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
}