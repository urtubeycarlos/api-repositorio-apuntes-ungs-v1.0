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
use models\Assignature as ChildAssignature;
use models\AssignatureQuery as ChildAssignatureQuery;
use models\Map\AssignatureTableMap;

/**
 * Base class that represents a query for the 'assignature' table.
 *
 *
 *
 * @method     ChildAssignatureQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAssignatureQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildAssignatureQuery orderByMd5Name($order = Criteria::ASC) Order by the md5_name column
 *
 * @method     ChildAssignatureQuery groupById() Group by the id column
 * @method     ChildAssignatureQuery groupByName() Group by the name column
 * @method     ChildAssignatureQuery groupByMd5Name() Group by the md5_name column
 *
 * @method     ChildAssignatureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAssignatureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAssignatureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAssignatureQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAssignatureQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAssignatureQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAssignatureQuery leftJoinCareerAssignature($relationAlias = null) Adds a LEFT JOIN clause to the query using the CareerAssignature relation
 * @method     ChildAssignatureQuery rightJoinCareerAssignature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CareerAssignature relation
 * @method     ChildAssignatureQuery innerJoinCareerAssignature($relationAlias = null) Adds a INNER JOIN clause to the query using the CareerAssignature relation
 *
 * @method     ChildAssignatureQuery joinWithCareerAssignature($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CareerAssignature relation
 *
 * @method     ChildAssignatureQuery leftJoinWithCareerAssignature() Adds a LEFT JOIN clause and with to the query using the CareerAssignature relation
 * @method     ChildAssignatureQuery rightJoinWithCareerAssignature() Adds a RIGHT JOIN clause and with to the query using the CareerAssignature relation
 * @method     ChildAssignatureQuery innerJoinWithCareerAssignature() Adds a INNER JOIN clause and with to the query using the CareerAssignature relation
 *
 * @method     ChildAssignatureQuery leftJoinNote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Note relation
 * @method     ChildAssignatureQuery rightJoinNote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Note relation
 * @method     ChildAssignatureQuery innerJoinNote($relationAlias = null) Adds a INNER JOIN clause to the query using the Note relation
 *
 * @method     ChildAssignatureQuery joinWithNote($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Note relation
 *
 * @method     ChildAssignatureQuery leftJoinWithNote() Adds a LEFT JOIN clause and with to the query using the Note relation
 * @method     ChildAssignatureQuery rightJoinWithNote() Adds a RIGHT JOIN clause and with to the query using the Note relation
 * @method     ChildAssignatureQuery innerJoinWithNote() Adds a INNER JOIN clause and with to the query using the Note relation
 *
 * @method     \models\CareerAssignatureQuery|\models\NoteQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAssignature findOne(ConnectionInterface $con = null) Return the first ChildAssignature matching the query
 * @method     ChildAssignature findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAssignature matching the query, or a new ChildAssignature object populated from the query conditions when no match is found
 *
 * @method     ChildAssignature findOneById(int $id) Return the first ChildAssignature filtered by the id column
 * @method     ChildAssignature findOneByName(string $name) Return the first ChildAssignature filtered by the name column
 * @method     ChildAssignature findOneByMd5Name(string $md5_name) Return the first ChildAssignature filtered by the md5_name column *

 * @method     ChildAssignature requirePk($key, ConnectionInterface $con = null) Return the ChildAssignature by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAssignature requireOne(ConnectionInterface $con = null) Return the first ChildAssignature matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAssignature requireOneById(int $id) Return the first ChildAssignature filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAssignature requireOneByName(string $name) Return the first ChildAssignature filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAssignature requireOneByMd5Name(string $md5_name) Return the first ChildAssignature filtered by the md5_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAssignature[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAssignature objects based on current ModelCriteria
 * @method     ChildAssignature[]|ObjectCollection findById(int $id) Return ChildAssignature objects filtered by the id column
 * @method     ChildAssignature[]|ObjectCollection findByName(string $name) Return ChildAssignature objects filtered by the name column
 * @method     ChildAssignature[]|ObjectCollection findByMd5Name(string $md5_name) Return ChildAssignature objects filtered by the md5_name column
 * @method     ChildAssignature[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AssignatureQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \models\Base\AssignatureQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\models\\Assignature', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAssignatureQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAssignatureQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAssignatureQuery) {
            return $criteria;
        }
        $query = new ChildAssignatureQuery();
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
     * @return ChildAssignature|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AssignatureTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AssignatureTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAssignature A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, md5_name FROM assignature WHERE id = :p0';
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
            /** @var ChildAssignature $obj */
            $obj = new ChildAssignature();
            $obj->hydrate($row);
            AssignatureTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAssignature|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAssignatureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AssignatureTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAssignatureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AssignatureTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAssignatureQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AssignatureTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AssignatureTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AssignatureTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAssignatureQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AssignatureTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildAssignatureQuery The current query, for fluid interface
     */
    public function filterByMd5Name($md5Name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($md5Name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AssignatureTableMap::COL_MD5_NAME, $md5Name, $comparison);
    }

    /**
     * Filter the query by a related \models\CareerAssignature object
     *
     * @param \models\CareerAssignature|ObjectCollection $careerAssignature the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAssignatureQuery The current query, for fluid interface
     */
    public function filterByCareerAssignature($careerAssignature, $comparison = null)
    {
        if ($careerAssignature instanceof \models\CareerAssignature) {
            return $this
                ->addUsingAlias(AssignatureTableMap::COL_ID, $careerAssignature->getAssignatureId(), $comparison);
        } elseif ($careerAssignature instanceof ObjectCollection) {
            return $this
                ->useCareerAssignatureQuery()
                ->filterByPrimaryKeys($careerAssignature->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCareerAssignature() only accepts arguments of type \models\CareerAssignature or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CareerAssignature relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAssignatureQuery The current query, for fluid interface
     */
    public function joinCareerAssignature($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CareerAssignature');

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
            $this->addJoinObject($join, 'CareerAssignature');
        }

        return $this;
    }

    /**
     * Use the CareerAssignature relation CareerAssignature object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \models\CareerAssignatureQuery A secondary query class using the current class as primary query
     */
    public function useCareerAssignatureQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCareerAssignature($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CareerAssignature', '\models\CareerAssignatureQuery');
    }

    /**
     * Filter the query by a related \models\Note object
     *
     * @param \models\Note|ObjectCollection $note the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAssignatureQuery The current query, for fluid interface
     */
    public function filterByNote($note, $comparison = null)
    {
        if ($note instanceof \models\Note) {
            return $this
                ->addUsingAlias(AssignatureTableMap::COL_ID, $note->getAssignatureId(), $comparison);
        } elseif ($note instanceof ObjectCollection) {
            return $this
                ->useNoteQuery()
                ->filterByPrimaryKeys($note->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNote() only accepts arguments of type \models\Note or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Note relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAssignatureQuery The current query, for fluid interface
     */
    public function joinNote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Note');

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
            $this->addJoinObject($join, 'Note');
        }

        return $this;
    }

    /**
     * Use the Note relation Note object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \models\NoteQuery A secondary query class using the current class as primary query
     */
    public function useNoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Note', '\models\NoteQuery');
    }

    /**
     * Filter the query by a related Career object
     * using the career_assignature table as cross reference
     *
     * @param Career $career the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAssignatureQuery The current query, for fluid interface
     */
    public function filterByCareer($career, $comparison = Criteria::EQUAL)
    {
        return $this
            ->useCareerAssignatureQuery()
            ->filterByCareer($career, $comparison)
            ->endUse();
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAssignature $assignature Object to remove from the list of results
     *
     * @return $this|ChildAssignatureQuery The current query, for fluid interface
     */
    public function prune($assignature = null)
    {
        if ($assignature) {
            $this->addUsingAlias(AssignatureTableMap::COL_ID, $assignature->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the assignature table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AssignatureTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AssignatureTableMap::clearInstancePool();
            AssignatureTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AssignatureTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AssignatureTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AssignatureTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AssignatureTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AssignatureQuery
