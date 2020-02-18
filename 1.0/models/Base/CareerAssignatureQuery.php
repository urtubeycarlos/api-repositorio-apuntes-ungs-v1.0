<?php

namespace models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use models\CareerAssignature as ChildCareerAssignature;
use models\CareerAssignatureQuery as ChildCareerAssignatureQuery;
use models\Map\CareerAssignatureTableMap;

/**
 * Base class that represents a query for the 'career_assignature' table.
 *
 *
 *
 * @method     ChildCareerAssignatureQuery orderByCareerId($order = Criteria::ASC) Order by the career_id column
 * @method     ChildCareerAssignatureQuery orderByAssignatureId($order = Criteria::ASC) Order by the assignature_id column
 *
 * @method     ChildCareerAssignatureQuery groupByCareerId() Group by the career_id column
 * @method     ChildCareerAssignatureQuery groupByAssignatureId() Group by the assignature_id column
 *
 * @method     ChildCareerAssignatureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCareerAssignatureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCareerAssignatureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCareerAssignatureQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCareerAssignatureQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCareerAssignatureQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCareerAssignatureQuery leftJoinCareer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Career relation
 * @method     ChildCareerAssignatureQuery rightJoinCareer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Career relation
 * @method     ChildCareerAssignatureQuery innerJoinCareer($relationAlias = null) Adds a INNER JOIN clause to the query using the Career relation
 *
 * @method     ChildCareerAssignatureQuery joinWithCareer($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Career relation
 *
 * @method     ChildCareerAssignatureQuery leftJoinWithCareer() Adds a LEFT JOIN clause and with to the query using the Career relation
 * @method     ChildCareerAssignatureQuery rightJoinWithCareer() Adds a RIGHT JOIN clause and with to the query using the Career relation
 * @method     ChildCareerAssignatureQuery innerJoinWithCareer() Adds a INNER JOIN clause and with to the query using the Career relation
 *
 * @method     ChildCareerAssignatureQuery leftJoinAssignature($relationAlias = null) Adds a LEFT JOIN clause to the query using the Assignature relation
 * @method     ChildCareerAssignatureQuery rightJoinAssignature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Assignature relation
 * @method     ChildCareerAssignatureQuery innerJoinAssignature($relationAlias = null) Adds a INNER JOIN clause to the query using the Assignature relation
 *
 * @method     ChildCareerAssignatureQuery joinWithAssignature($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Assignature relation
 *
 * @method     ChildCareerAssignatureQuery leftJoinWithAssignature() Adds a LEFT JOIN clause and with to the query using the Assignature relation
 * @method     ChildCareerAssignatureQuery rightJoinWithAssignature() Adds a RIGHT JOIN clause and with to the query using the Assignature relation
 * @method     ChildCareerAssignatureQuery innerJoinWithAssignature() Adds a INNER JOIN clause and with to the query using the Assignature relation
 *
 * @method     \models\CareerQuery|\models\AssignatureQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCareerAssignature findOne(ConnectionInterface $con = null) Return the first ChildCareerAssignature matching the query
 * @method     ChildCareerAssignature findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCareerAssignature matching the query, or a new ChildCareerAssignature object populated from the query conditions when no match is found
 *
 * @method     ChildCareerAssignature findOneByCareerId(int $career_id) Return the first ChildCareerAssignature filtered by the career_id column
 * @method     ChildCareerAssignature findOneByAssignatureId(int $assignature_id) Return the first ChildCareerAssignature filtered by the assignature_id column *

 * @method     ChildCareerAssignature requirePk($key, ConnectionInterface $con = null) Return the ChildCareerAssignature by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareerAssignature requireOne(ConnectionInterface $con = null) Return the first ChildCareerAssignature matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareerAssignature requireOneByCareerId(int $career_id) Return the first ChildCareerAssignature filtered by the career_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareerAssignature requireOneByAssignatureId(int $assignature_id) Return the first ChildCareerAssignature filtered by the assignature_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareerAssignature[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCareerAssignature objects based on current ModelCriteria
 * @method     ChildCareerAssignature[]|ObjectCollection findByCareerId(int $career_id) Return ChildCareerAssignature objects filtered by the career_id column
 * @method     ChildCareerAssignature[]|ObjectCollection findByAssignatureId(int $assignature_id) Return ChildCareerAssignature objects filtered by the assignature_id column
 * @method     ChildCareerAssignature[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CareerAssignatureQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \models\Base\CareerAssignatureQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\models\\CareerAssignature', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCareerAssignatureQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCareerAssignatureQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCareerAssignatureQuery) {
            return $criteria;
        }
        $query = new ChildCareerAssignatureQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$career_id, $assignature_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCareerAssignature|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CareerAssignatureTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CareerAssignatureTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCareerAssignature A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT career_id, assignature_id FROM career_assignature WHERE career_id = :p0 AND assignature_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCareerAssignature $obj */
            $obj = new ChildCareerAssignature();
            $obj->hydrate($row);
            CareerAssignatureTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildCareerAssignature|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CareerAssignatureTableMap::COL_CAREER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CareerAssignatureTableMap::COL_ASSIGNATURE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CareerAssignatureTableMap::COL_CAREER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CareerAssignatureTableMap::COL_ASSIGNATURE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the career_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCareerId(1234); // WHERE career_id = 1234
     * $query->filterByCareerId(array(12, 34)); // WHERE career_id IN (12, 34)
     * $query->filterByCareerId(array('min' => 12)); // WHERE career_id > 12
     * </code>
     *
     * @see       filterByCareer()
     *
     * @param     mixed $careerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function filterByCareerId($careerId = null, $comparison = null)
    {
        if (is_array($careerId)) {
            $useMinMax = false;
            if (isset($careerId['min'])) {
                $this->addUsingAlias(CareerAssignatureTableMap::COL_CAREER_ID, $careerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($careerId['max'])) {
                $this->addUsingAlias(CareerAssignatureTableMap::COL_CAREER_ID, $careerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareerAssignatureTableMap::COL_CAREER_ID, $careerId, $comparison);
    }

    /**
     * Filter the query on the assignature_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAssignatureId(1234); // WHERE assignature_id = 1234
     * $query->filterByAssignatureId(array(12, 34)); // WHERE assignature_id IN (12, 34)
     * $query->filterByAssignatureId(array('min' => 12)); // WHERE assignature_id > 12
     * </code>
     *
     * @see       filterByAssignature()
     *
     * @param     mixed $assignatureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function filterByAssignatureId($assignatureId = null, $comparison = null)
    {
        if (is_array($assignatureId)) {
            $useMinMax = false;
            if (isset($assignatureId['min'])) {
                $this->addUsingAlias(CareerAssignatureTableMap::COL_ASSIGNATURE_ID, $assignatureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($assignatureId['max'])) {
                $this->addUsingAlias(CareerAssignatureTableMap::COL_ASSIGNATURE_ID, $assignatureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareerAssignatureTableMap::COL_ASSIGNATURE_ID, $assignatureId, $comparison);
    }

    /**
     * Filter the query by a related \models\Career object
     *
     * @param \models\Career|ObjectCollection $career The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function filterByCareer($career, $comparison = null)
    {
        if ($career instanceof \models\Career) {
            return $this
                ->addUsingAlias(CareerAssignatureTableMap::COL_CAREER_ID, $career->getId(), $comparison);
        } elseif ($career instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CareerAssignatureTableMap::COL_CAREER_ID, $career->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCareer() only accepts arguments of type \models\Career or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Career relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function joinCareer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Career');

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
            $this->addJoinObject($join, 'Career');
        }

        return $this;
    }

    /**
     * Use the Career relation Career object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \models\CareerQuery A secondary query class using the current class as primary query
     */
    public function useCareerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCareer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Career', '\models\CareerQuery');
    }

    /**
     * Filter the query by a related \models\Assignature object
     *
     * @param \models\Assignature|ObjectCollection $assignature The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function filterByAssignature($assignature, $comparison = null)
    {
        if ($assignature instanceof \models\Assignature) {
            return $this
                ->addUsingAlias(CareerAssignatureTableMap::COL_ASSIGNATURE_ID, $assignature->getId(), $comparison);
        } elseif ($assignature instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CareerAssignatureTableMap::COL_ASSIGNATURE_ID, $assignature->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAssignature() only accepts arguments of type \models\Assignature or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Assignature relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function joinAssignature($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Assignature');

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
            $this->addJoinObject($join, 'Assignature');
        }

        return $this;
    }

    /**
     * Use the Assignature relation Assignature object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \models\AssignatureQuery A secondary query class using the current class as primary query
     */
    public function useAssignatureQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAssignature($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Assignature', '\models\AssignatureQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCareerAssignature $careerAssignature Object to remove from the list of results
     *
     * @return $this|ChildCareerAssignatureQuery The current query, for fluid interface
     */
    public function prune($careerAssignature = null)
    {
        if ($careerAssignature) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CareerAssignatureTableMap::COL_CAREER_ID), $careerAssignature->getCareerId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CareerAssignatureTableMap::COL_ASSIGNATURE_ID), $careerAssignature->getAssignatureId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the career_assignature table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareerAssignatureTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CareerAssignatureTableMap::clearInstancePool();
            CareerAssignatureTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareerAssignatureTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CareerAssignatureTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CareerAssignatureTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CareerAssignatureTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CareerAssignatureQuery
