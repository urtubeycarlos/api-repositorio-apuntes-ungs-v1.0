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
use models\Career as ChildCareer;
use models\CareerQuery as ChildCareerQuery;
use models\Map\CareerTableMap;

/**
 * Base class that represents a query for the 'career' table.
 *
 *
 *
 * @method     ChildCareerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCareerQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCareerQuery orderByMd5Name($order = Criteria::ASC) Order by the md5_name column
 *
 * @method     ChildCareerQuery groupById() Group by the id column
 * @method     ChildCareerQuery groupByName() Group by the name column
 * @method     ChildCareerQuery groupByMd5Name() Group by the md5_name column
 *
 * @method     ChildCareerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCareerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCareerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCareerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCareerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCareerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCareerQuery leftJoinAssignature($relationAlias = null) Adds a LEFT JOIN clause to the query using the Assignature relation
 * @method     ChildCareerQuery rightJoinAssignature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Assignature relation
 * @method     ChildCareerQuery innerJoinAssignature($relationAlias = null) Adds a INNER JOIN clause to the query using the Assignature relation
 *
 * @method     ChildCareerQuery joinWithAssignature($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Assignature relation
 *
 * @method     ChildCareerQuery leftJoinWithAssignature() Adds a LEFT JOIN clause and with to the query using the Assignature relation
 * @method     ChildCareerQuery rightJoinWithAssignature() Adds a RIGHT JOIN clause and with to the query using the Assignature relation
 * @method     ChildCareerQuery innerJoinWithAssignature() Adds a INNER JOIN clause and with to the query using the Assignature relation
 *
 * @method     \models\AssignatureQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCareer findOne(ConnectionInterface $con = null) Return the first ChildCareer matching the query
 * @method     ChildCareer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCareer matching the query, or a new ChildCareer object populated from the query conditions when no match is found
 *
 * @method     ChildCareer findOneById(int $id) Return the first ChildCareer filtered by the id column
 * @method     ChildCareer findOneByName(string $name) Return the first ChildCareer filtered by the name column
 * @method     ChildCareer findOneByMd5Name(string $md5_name) Return the first ChildCareer filtered by the md5_name column *

 * @method     ChildCareer requirePk($key, ConnectionInterface $con = null) Return the ChildCareer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareer requireOne(ConnectionInterface $con = null) Return the first ChildCareer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareer requireOneById(int $id) Return the first ChildCareer filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareer requireOneByName(string $name) Return the first ChildCareer filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCareer requireOneByMd5Name(string $md5_name) Return the first ChildCareer filtered by the md5_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCareer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCareer objects based on current ModelCriteria
 * @method     ChildCareer[]|ObjectCollection findById(int $id) Return ChildCareer objects filtered by the id column
 * @method     ChildCareer[]|ObjectCollection findByName(string $name) Return ChildCareer objects filtered by the name column
 * @method     ChildCareer[]|ObjectCollection findByMd5Name(string $md5_name) Return ChildCareer objects filtered by the md5_name column
 * @method     ChildCareer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CareerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \models\Base\CareerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\models\\Career', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCareerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCareerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCareerQuery) {
            return $criteria;
        }
        $query = new ChildCareerQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCareer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CareerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CareerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCareer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, md5_name FROM career WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCareer $obj */
            $obj = new ChildCareer();
            $obj->hydrate($row);
            CareerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCareer|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildCareerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CareerTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCareerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CareerTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareerQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CareerTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CareerTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareerTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareerQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareerTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the md5_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMd5Name('fooValue');   // WHERE md5_name = 'fooValue'
     * $query->filterByMd5Name('%fooValue%', Criteria::LIKE); // WHERE md5_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $md5Name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCareerQuery The current query, for fluid interface
     */
    public function filterByMd5Name($md5Name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($md5Name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CareerTableMap::COL_MD5_NAME, $md5Name, $comparison);
    }

    /**
     * Filter the query by a related \models\Assignature object
     *
     * @param \models\Assignature|ObjectCollection $assignature the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCareerQuery The current query, for fluid interface
     */
    public function filterByAssignature($assignature, $comparison = null)
    {
        if ($assignature instanceof \models\Assignature) {
            return $this
                ->addUsingAlias(CareerTableMap::COL_ID, $assignature->getCareerId(), $comparison);
        } elseif ($assignature instanceof ObjectCollection) {
            return $this
                ->useAssignatureQuery()
                ->filterByPrimaryKeys($assignature->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildCareerQuery The current query, for fluid interface
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
     * @param   ChildCareer $career Object to remove from the list of results
     *
     * @return $this|ChildCareerQuery The current query, for fluid interface
     */
    public function prune($career = null)
    {
        if ($career) {
            $this->addUsingAlias(CareerTableMap::COL_ID, $career->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the career table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CareerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CareerTableMap::clearInstancePool();
            CareerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CareerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CareerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CareerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CareerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CareerQuery
