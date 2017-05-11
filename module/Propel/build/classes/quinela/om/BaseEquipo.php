<?php


/**
 * Base class that represents a row from the 'equipo' table.
 *
 *
 *
 * @package    propel.generator.quinela.om
 */
abstract class BaseEquipo extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'EquipoPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EquipoPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idequipo field.
     * @var        int
     */
    protected $idequipo;

    /**
     * The value for the equipo_nombre field.
     * @var        string
     */
    protected $equipo_nombre;

    /**
     * The value for the equipo_img field.
     * @var        string
     */
    protected $equipo_img;

    /**
     * @var        PropelObjectCollection|Participante[] Collection to store aggregation of Participante objects.
     */
    protected $collParticipantes;
    protected $collParticipantesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $participantesScheduledForDeletion = null;

    /**
     * Get the [idequipo] column value.
     *
     * @return int
     */
    public function getIdequipo()
    {

        return $this->idequipo;
    }

    /**
     * Get the [equipo_nombre] column value.
     *
     * @return string
     */
    public function getEquipoNombre()
    {

        return $this->equipo_nombre;
    }

    /**
     * Get the [equipo_img] column value.
     *
     * @return string
     */
    public function getEquipoImg()
    {

        return $this->equipo_img;
    }

    /**
     * Set the value of [idequipo] column.
     *
     * @param  int $v new value
     * @return Equipo The current object (for fluent API support)
     */
    public function setIdequipo($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idequipo !== $v) {
            $this->idequipo = $v;
            $this->modifiedColumns[] = EquipoPeer::IDEQUIPO;
        }


        return $this;
    } // setIdequipo()

    /**
     * Set the value of [equipo_nombre] column.
     *
     * @param  string $v new value
     * @return Equipo The current object (for fluent API support)
     */
    public function setEquipoNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->equipo_nombre !== $v) {
            $this->equipo_nombre = $v;
            $this->modifiedColumns[] = EquipoPeer::EQUIPO_NOMBRE;
        }


        return $this;
    } // setEquipoNombre()

    /**
     * Set the value of [equipo_img] column.
     *
     * @param  string $v new value
     * @return Equipo The current object (for fluent API support)
     */
    public function setEquipoImg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->equipo_img !== $v) {
            $this->equipo_img = $v;
            $this->modifiedColumns[] = EquipoPeer::EQUIPO_IMG;
        }


        return $this;
    } // setEquipoImg()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->idequipo = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->equipo_nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->equipo_img = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = EquipoPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Equipo object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(EquipoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EquipoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collParticipantes = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(EquipoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EquipoQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(EquipoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                EquipoPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->participantesScheduledForDeletion !== null) {
                if (!$this->participantesScheduledForDeletion->isEmpty()) {
                    ParticipanteQuery::create()
                        ->filterByPrimaryKeys($this->participantesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->participantesScheduledForDeletion = null;
                }
            }

            if ($this->collParticipantes !== null) {
                foreach ($this->collParticipantes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = EquipoPeer::IDEQUIPO;
        if (null !== $this->idequipo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EquipoPeer::IDEQUIPO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EquipoPeer::IDEQUIPO)) {
            $modifiedColumns[':p' . $index++]  = '`idequipo`';
        }
        if ($this->isColumnModified(EquipoPeer::EQUIPO_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`equipo_nombre`';
        }
        if ($this->isColumnModified(EquipoPeer::EQUIPO_IMG)) {
            $modifiedColumns[':p' . $index++]  = '`equipo_img`';
        }

        $sql = sprintf(
            'INSERT INTO `equipo` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idequipo`':
                        $stmt->bindValue($identifier, $this->idequipo, PDO::PARAM_INT);
                        break;
                    case '`equipo_nombre`':
                        $stmt->bindValue($identifier, $this->equipo_nombre, PDO::PARAM_STR);
                        break;
                    case '`equipo_img`':
                        $stmt->bindValue($identifier, $this->equipo_img, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdequipo($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = EquipoPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collParticipantes !== null) {
                    foreach ($this->collParticipantes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = EquipoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdequipo();
                break;
            case 1:
                return $this->getEquipoNombre();
                break;
            case 2:
                return $this->getEquipoImg();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Equipo'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Equipo'][$this->getPrimaryKey()] = true;
        $keys = EquipoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdequipo(),
            $keys[1] => $this->getEquipoNombre(),
            $keys[2] => $this->getEquipoImg(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collParticipantes) {
                $result['Participantes'] = $this->collParticipantes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = EquipoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdequipo($value);
                break;
            case 1:
                $this->setEquipoNombre($value);
                break;
            case 2:
                $this->setEquipoImg($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = EquipoPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdequipo($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setEquipoNombre($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setEquipoImg($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EquipoPeer::DATABASE_NAME);

        if ($this->isColumnModified(EquipoPeer::IDEQUIPO)) $criteria->add(EquipoPeer::IDEQUIPO, $this->idequipo);
        if ($this->isColumnModified(EquipoPeer::EQUIPO_NOMBRE)) $criteria->add(EquipoPeer::EQUIPO_NOMBRE, $this->equipo_nombre);
        if ($this->isColumnModified(EquipoPeer::EQUIPO_IMG)) $criteria->add(EquipoPeer::EQUIPO_IMG, $this->equipo_img);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(EquipoPeer::DATABASE_NAME);
        $criteria->add(EquipoPeer::IDEQUIPO, $this->idequipo);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdequipo();
    }

    /**
     * Generic method to set the primary key (idequipo column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdequipo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdequipo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Equipo (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEquipoNombre($this->getEquipoNombre());
        $copyObj->setEquipoImg($this->getEquipoImg());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getParticipantes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addParticipante($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdequipo(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Equipo Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return EquipoPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EquipoPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Participante' == $relationName) {
            $this->initParticipantes();
        }
    }

    /**
     * Clears out the collParticipantes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Equipo The current object (for fluent API support)
     * @see        addParticipantes()
     */
    public function clearParticipantes()
    {
        $this->collParticipantes = null; // important to set this to null since that means it is uninitialized
        $this->collParticipantesPartial = null;

        return $this;
    }

    /**
     * reset is the collParticipantes collection loaded partially
     *
     * @return void
     */
    public function resetPartialParticipantes($v = true)
    {
        $this->collParticipantesPartial = $v;
    }

    /**
     * Initializes the collParticipantes collection.
     *
     * By default this just sets the collParticipantes collection to an empty array (like clearcollParticipantes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initParticipantes($overrideExisting = true)
    {
        if (null !== $this->collParticipantes && !$overrideExisting) {
            return;
        }
        $this->collParticipantes = new PropelObjectCollection();
        $this->collParticipantes->setModel('Participante');
    }

    /**
     * Gets an array of Participante objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Equipo is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Participante[] List of Participante objects
     * @throws PropelException
     */
    public function getParticipantes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collParticipantesPartial && !$this->isNew();
        if (null === $this->collParticipantes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collParticipantes) {
                // return empty collection
                $this->initParticipantes();
            } else {
                $collParticipantes = ParticipanteQuery::create(null, $criteria)
                    ->filterByEquipo($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collParticipantesPartial && count($collParticipantes)) {
                      $this->initParticipantes(false);

                      foreach ($collParticipantes as $obj) {
                        if (false == $this->collParticipantes->contains($obj)) {
                          $this->collParticipantes->append($obj);
                        }
                      }

                      $this->collParticipantesPartial = true;
                    }

                    $collParticipantes->getInternalIterator()->rewind();

                    return $collParticipantes;
                }

                if ($partial && $this->collParticipantes) {
                    foreach ($this->collParticipantes as $obj) {
                        if ($obj->isNew()) {
                            $collParticipantes[] = $obj;
                        }
                    }
                }

                $this->collParticipantes = $collParticipantes;
                $this->collParticipantesPartial = false;
            }
        }

        return $this->collParticipantes;
    }

    /**
     * Sets a collection of Participante objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $participantes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Equipo The current object (for fluent API support)
     */
    public function setParticipantes(PropelCollection $participantes, PropelPDO $con = null)
    {
        $participantesToDelete = $this->getParticipantes(new Criteria(), $con)->diff($participantes);


        $this->participantesScheduledForDeletion = $participantesToDelete;

        foreach ($participantesToDelete as $participanteRemoved) {
            $participanteRemoved->setEquipo(null);
        }

        $this->collParticipantes = null;
        foreach ($participantes as $participante) {
            $this->addParticipante($participante);
        }

        $this->collParticipantes = $participantes;
        $this->collParticipantesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Participante objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Participante objects.
     * @throws PropelException
     */
    public function countParticipantes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collParticipantesPartial && !$this->isNew();
        if (null === $this->collParticipantes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collParticipantes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getParticipantes());
            }
            $query = ParticipanteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEquipo($this)
                ->count($con);
        }

        return count($this->collParticipantes);
    }

    /**
     * Method called to associate a Participante object to this object
     * through the Participante foreign key attribute.
     *
     * @param    Participante $l Participante
     * @return Equipo The current object (for fluent API support)
     */
    public function addParticipante(Participante $l)
    {
        if ($this->collParticipantes === null) {
            $this->initParticipantes();
            $this->collParticipantesPartial = true;
        }

        if (!in_array($l, $this->collParticipantes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddParticipante($l);

            if ($this->participantesScheduledForDeletion and $this->participantesScheduledForDeletion->contains($l)) {
                $this->participantesScheduledForDeletion->remove($this->participantesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Participante $participante The participante object to add.
     */
    protected function doAddParticipante($participante)
    {
        $this->collParticipantes[]= $participante;
        $participante->setEquipo($this);
    }

    /**
     * @param	Participante $participante The participante object to remove.
     * @return Equipo The current object (for fluent API support)
     */
    public function removeParticipante($participante)
    {
        if ($this->getParticipantes()->contains($participante)) {
            $this->collParticipantes->remove($this->collParticipantes->search($participante));
            if (null === $this->participantesScheduledForDeletion) {
                $this->participantesScheduledForDeletion = clone $this->collParticipantes;
                $this->participantesScheduledForDeletion->clear();
            }
            $this->participantesScheduledForDeletion[]= $participante;
            $participante->setEquipo(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idequipo = null;
        $this->equipo_nombre = null;
        $this->equipo_img = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collParticipantes) {
                foreach ($this->collParticipantes as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collParticipantes instanceof PropelCollection) {
            $this->collParticipantes->clearIterator();
        }
        $this->collParticipantes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EquipoPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
