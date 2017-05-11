<?php


/**
 * Base class that represents a query for the 'participante' table.
 *
 *
 *
 * @method ParticipanteQuery orderByIdparticipante($order = Criteria::ASC) Order by the idparticipante column
 * @method ParticipanteQuery orderByParticipanteNombre($order = Criteria::ASC) Order by the participante_nombre column
 * @method ParticipanteQuery orderByParticipanteEstatus($order = Criteria::ASC) Order by the participante_estatus column
 * @method ParticipanteQuery orderByIdequipo($order = Criteria::ASC) Order by the idequipo column
 *
 * @method ParticipanteQuery groupByIdparticipante() Group by the idparticipante column
 * @method ParticipanteQuery groupByParticipanteNombre() Group by the participante_nombre column
 * @method ParticipanteQuery groupByParticipanteEstatus() Group by the participante_estatus column
 * @method ParticipanteQuery groupByIdequipo() Group by the idequipo column
 *
 * @method ParticipanteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ParticipanteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ParticipanteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ParticipanteQuery leftJoinEquipo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Equipo relation
 * @method ParticipanteQuery rightJoinEquipo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Equipo relation
 * @method ParticipanteQuery innerJoinEquipo($relationAlias = null) Adds a INNER JOIN clause to the query using the Equipo relation
 *
 * @method Participante findOne(PropelPDO $con = null) Return the first Participante matching the query
 * @method Participante findOneOrCreate(PropelPDO $con = null) Return the first Participante matching the query, or a new Participante object populated from the query conditions when no match is found
 *
 * @method Participante findOneByParticipanteNombre(string $participante_nombre) Return the first Participante filtered by the participante_nombre column
 * @method Participante findOneByParticipanteEstatus(int $participante_estatus) Return the first Participante filtered by the participante_estatus column
 * @method Participante findOneByIdequipo(int $idequipo) Return the first Participante filtered by the idequipo column
 *
 * @method array findByIdparticipante(int $idparticipante) Return Participante objects filtered by the idparticipante column
 * @method array findByParticipanteNombre(string $participante_nombre) Return Participante objects filtered by the participante_nombre column
 * @method array findByParticipanteEstatus(int $participante_estatus) Return Participante objects filtered by the participante_estatus column
 * @method array findByIdequipo(int $idequipo) Return Participante objects filtered by the idequipo column
 *
 * @package    propel.generator.quinela.om
 */
abstract class BaseParticipanteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseParticipanteQuery object.
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
            $modelName = 'Participante';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ParticipanteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ParticipanteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ParticipanteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ParticipanteQuery) {
            return $criteria;
        }
        $query = new ParticipanteQuery(null, null, $modelAlias);

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
     * @return   Participante|Participante[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ParticipantePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ParticipantePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Participante A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdparticipante($key, $con = null)
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
     * @return                 Participante A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idparticipante`, `participante_nombre`, `participante_estatus`, `idequipo` FROM `participante` WHERE `idparticipante` = :p0';
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
            $obj = new Participante();
            $obj->hydrate($row);
            ParticipantePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Participante|Participante[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Participante[]|mixed the list of results, formatted by the current formatter
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
     * @return ParticipanteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ParticipantePeer::IDPARTICIPANTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ParticipanteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ParticipantePeer::IDPARTICIPANTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idparticipante column
     *
     * Example usage:
     * <code>
     * $query->filterByIdparticipante(1234); // WHERE idparticipante = 1234
     * $query->filterByIdparticipante(array(12, 34)); // WHERE idparticipante IN (12, 34)
     * $query->filterByIdparticipante(array('min' => 12)); // WHERE idparticipante >= 12
     * $query->filterByIdparticipante(array('max' => 12)); // WHERE idparticipante <= 12
     * </code>
     *
     * @param     mixed $idparticipante The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParticipanteQuery The current query, for fluid interface
     */
    public function filterByIdparticipante($idparticipante = null, $comparison = null)
    {
        if (is_array($idparticipante)) {
            $useMinMax = false;
            if (isset($idparticipante['min'])) {
                $this->addUsingAlias(ParticipantePeer::IDPARTICIPANTE, $idparticipante['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idparticipante['max'])) {
                $this->addUsingAlias(ParticipantePeer::IDPARTICIPANTE, $idparticipante['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ParticipantePeer::IDPARTICIPANTE, $idparticipante, $comparison);
    }

    /**
     * Filter the query on the participante_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByParticipanteNombre('fooValue');   // WHERE participante_nombre = 'fooValue'
     * $query->filterByParticipanteNombre('%fooValue%'); // WHERE participante_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $participanteNombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParticipanteQuery The current query, for fluid interface
     */
    public function filterByParticipanteNombre($participanteNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($participanteNombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $participanteNombre)) {
                $participanteNombre = str_replace('*', '%', $participanteNombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ParticipantePeer::PARTICIPANTE_NOMBRE, $participanteNombre, $comparison);
    }

    /**
     * Filter the query on the participante_estatus column
     *
     * Example usage:
     * <code>
     * $query->filterByParticipanteEstatus(1234); // WHERE participante_estatus = 1234
     * $query->filterByParticipanteEstatus(array(12, 34)); // WHERE participante_estatus IN (12, 34)
     * $query->filterByParticipanteEstatus(array('min' => 12)); // WHERE participante_estatus >= 12
     * $query->filterByParticipanteEstatus(array('max' => 12)); // WHERE participante_estatus <= 12
     * </code>
     *
     * @param     mixed $participanteEstatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParticipanteQuery The current query, for fluid interface
     */
    public function filterByParticipanteEstatus($participanteEstatus = null, $comparison = null)
    {
        if (is_array($participanteEstatus)) {
            $useMinMax = false;
            if (isset($participanteEstatus['min'])) {
                $this->addUsingAlias(ParticipantePeer::PARTICIPANTE_ESTATUS, $participanteEstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($participanteEstatus['max'])) {
                $this->addUsingAlias(ParticipantePeer::PARTICIPANTE_ESTATUS, $participanteEstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ParticipantePeer::PARTICIPANTE_ESTATUS, $participanteEstatus, $comparison);
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
     * @see       filterByEquipo()
     *
     * @param     mixed $idequipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ParticipanteQuery The current query, for fluid interface
     */
    public function filterByIdequipo($idequipo = null, $comparison = null)
    {
        if (is_array($idequipo)) {
            $useMinMax = false;
            if (isset($idequipo['min'])) {
                $this->addUsingAlias(ParticipantePeer::IDEQUIPO, $idequipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idequipo['max'])) {
                $this->addUsingAlias(ParticipantePeer::IDEQUIPO, $idequipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ParticipantePeer::IDEQUIPO, $idequipo, $comparison);
    }

    /**
     * Filter the query by a related Equipo object
     *
     * @param   Equipo|PropelObjectCollection $equipo The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ParticipanteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEquipo($equipo, $comparison = null)
    {
        if ($equipo instanceof Equipo) {
            return $this
                ->addUsingAlias(ParticipantePeer::IDEQUIPO, $equipo->getIdequipo(), $comparison);
        } elseif ($equipo instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ParticipantePeer::IDEQUIPO, $equipo->toKeyValue('PrimaryKey', 'Idequipo'), $comparison);
        } else {
            throw new PropelException('filterByEquipo() only accepts arguments of type Equipo or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Equipo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ParticipanteQuery The current query, for fluid interface
     */
    public function joinEquipo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Equipo');

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
            $this->addJoinObject($join, 'Equipo');
        }

        return $this;
    }

    /**
     * Use the Equipo relation Equipo object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EquipoQuery A secondary query class using the current class as primary query
     */
    public function useEquipoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEquipo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Equipo', 'EquipoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Participante $participante Object to remove from the list of results
     *
     * @return ParticipanteQuery The current query, for fluid interface
     */
    public function prune($participante = null)
    {
        if ($participante) {
            $this->addUsingAlias(ParticipantePeer::IDPARTICIPANTE, $participante->getIdparticipante(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
