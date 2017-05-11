<?php


/**
 * Base class that represents a query for the 'equipo' table.
 *
 *
 *
 * @method EquipoQuery orderByIdequipo($order = Criteria::ASC) Order by the idequipo column
 * @method EquipoQuery orderByEquipoNombre($order = Criteria::ASC) Order by the equipo_nombre column
 * @method EquipoQuery orderByEquipoImg($order = Criteria::ASC) Order by the equipo_img column
 *
 * @method EquipoQuery groupByIdequipo() Group by the idequipo column
 * @method EquipoQuery groupByEquipoNombre() Group by the equipo_nombre column
 * @method EquipoQuery groupByEquipoImg() Group by the equipo_img column
 *
 * @method EquipoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EquipoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EquipoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EquipoQuery leftJoinParticipante($relationAlias = null) Adds a LEFT JOIN clause to the query using the Participante relation
 * @method EquipoQuery rightJoinParticipante($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Participante relation
 * @method EquipoQuery innerJoinParticipante($relationAlias = null) Adds a INNER JOIN clause to the query using the Participante relation
 *
 * @method Equipo findOne(PropelPDO $con = null) Return the first Equipo matching the query
 * @method Equipo findOneOrCreate(PropelPDO $con = null) Return the first Equipo matching the query, or a new Equipo object populated from the query conditions when no match is found
 *
 * @method Equipo findOneByEquipoNombre(string $equipo_nombre) Return the first Equipo filtered by the equipo_nombre column
 * @method Equipo findOneByEquipoImg(string $equipo_img) Return the first Equipo filtered by the equipo_img column
 *
 * @method array findByIdequipo(int $idequipo) Return Equipo objects filtered by the idequipo column
 * @method array findByEquipoNombre(string $equipo_nombre) Return Equipo objects filtered by the equipo_nombre column
 * @method array findByEquipoImg(string $equipo_img) Return Equipo objects filtered by the equipo_img column
 *
 * @package    propel.generator.quinela.om
 */
abstract class BaseEquipoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEquipoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'quinela';
        }
        if (null === $modelName) {
            $modelName = 'Equipo';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EquipoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EquipoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EquipoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EquipoQuery) {
            return $criteria;
        }
        $query = new EquipoQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Equipo|Equipo[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EquipoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EquipoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Equipo A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdequipo($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Equipo A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idequipo`, `equipo_nombre`, `equipo_img` FROM `equipo` WHERE `idequipo` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Equipo();
            $obj->hydrate($row);
            EquipoPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Equipo|Equipo[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Equipo[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return EquipoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EquipoPeer::IDEQUIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EquipoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EquipoPeer::IDEQUIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idequipo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdequipo(1234); // WHERE idequipo = 1234
     * $query->filterByIdequipo(array(12, 34)); // WHERE idequipo IN (12, 34)
     * $query->filterByIdequipo(array('min' => 12)); // WHERE idequipo >= 12
     * $query->filterByIdequipo(array('max' => 12)); // WHERE idequipo <= 12
     * </code>
     *
     * @param     mixed $idequipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EquipoQuery The current query, for fluid interface
     */
    public function filterByIdequipo($idequipo = null, $comparison = null)
    {
        if (is_array($idequipo)) {
            $useMinMax = false;
            if (isset($idequipo['min'])) {
                $this->addUsingAlias(EquipoPeer::IDEQUIPO, $idequipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idequipo['max'])) {
                $this->addUsingAlias(EquipoPeer::IDEQUIPO, $idequipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EquipoPeer::IDEQUIPO, $idequipo, $comparison);
    }

    /**
     * Filter the query on the equipo_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByEquipoNombre('fooValue');   // WHERE equipo_nombre = 'fooValue'
     * $query->filterByEquipoNombre('%fooValue%'); // WHERE equipo_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $equipoNombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EquipoQuery The current query, for fluid interface
     */
    public function filterByEquipoNombre($equipoNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($equipoNombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $equipoNombre)) {
                $equipoNombre = str_replace('*', '%', $equipoNombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EquipoPeer::EQUIPO_NOMBRE, $equipoNombre, $comparison);
    }

    /**
     * Filter the query on the equipo_img column
     *
     * Example usage:
     * <code>
     * $query->filterByEquipoImg('fooValue');   // WHERE equipo_img = 'fooValue'
     * $query->filterByEquipoImg('%fooValue%'); // WHERE equipo_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $equipoImg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EquipoQuery The current query, for fluid interface
     */
    public function filterByEquipoImg($equipoImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($equipoImg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $equipoImg)) {
                $equipoImg = str_replace('*', '%', $equipoImg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EquipoPeer::EQUIPO_IMG, $equipoImg, $comparison);
    }

    /**
     * Filter the query by a related Participante object
     *
     * @param   Participante|PropelObjectCollection $participante  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EquipoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByParticipante($participante, $comparison = null)
    {
        if ($participante instanceof Participante) {
            return $this
                ->addUsingAlias(EquipoPeer::IDEQUIPO, $participante->getIdequipo(), $comparison);
        } elseif ($participante instanceof PropelObjectCollection) {
            return $this
                ->useParticipanteQuery()
                ->filterByPrimaryKeys($participante->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByParticipante() only accepts arguments of type Participante or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Participante relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EquipoQuery The current query, for fluid interface
     */
    public function joinParticipante($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Participante');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Participante');
        }

        return $this;
    }

    /**
     * Use the Participante relation Participante object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ParticipanteQuery A secondary query class using the current class as primary query
     */
    public function useParticipanteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinParticipante($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Participante', 'ParticipanteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Equipo $equipo Object to remove from the list of results
     *
     * @return EquipoQuery The current query, for fluid interface
     */
    public function prune($equipo = null)
    {
        if ($equipo) {
            $this->addUsingAlias(EquipoPeer::IDEQUIPO, $equipo->getIdequipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
