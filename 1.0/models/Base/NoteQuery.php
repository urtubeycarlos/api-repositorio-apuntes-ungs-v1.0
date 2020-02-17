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
use models\Note as ChildNote;
use models\NoteQuery as ChildNoteQuery;
use models\Map\NoteTableMap;

/**
 * Base class that represents a query for the 'note' table.
 *
 *
 *
 * @method     ChildNoteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildNoteQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method     ChildNoteQuery orderByExtension($order = Criteria::ASC) Order by the extension column
 * @method     ChildNoteQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildNoteQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildNoteQuery orderByAssignatureId($order = Criteria::ASC) Order by the assignature_id column
 *
 * @method     ChildNoteQuery groupById() Group by the id column
 * @method     ChildNoteQuery groupByFilename() Group by the filename column
 * @method     ChildNoteQuery groupByExtension() Group by the extension column
 * @method     ChildNoteQuery groupByDescription() Group by the description column
 * @method     ChildNoteQuery groupByUrl() Group by the url column
 * @method     ChildNoteQuery groupByAssignatureId() Group by the assignature_id column
 *
 * @method     ChildNoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNoteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNoteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNoteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNoteQuery leftJoinAssignature($relationAlias = null) Adds a LEFT JOIN clause to the query using the Assignature relation
 * @method     ChildNoteQuery rightJoinAssignature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Assignature relation
 * @method     ChildNoteQuery innerJoinAssignature($relationAlias = null) Adds a INNER JOIN clause to the query using the Assignature relation
 *
 * @method     ChildNoteQuery joinWithAssignature($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Assignature relation
 *
 * @method     ChildNoteQuery leftJoinWithAssignature() Adds a LEFT JOIN clause and with to the query using the Assignature relation
 * @method     ChildNoteQuery rightJoinWithAssignature() Adds a RIGHT JOIN clause and with to the query using the Assignature relation
 * @method     ChildNoteQuery innerJoinWithAssignature() Adds a INNER JOIN clause and with to the query using the Assignature relation
 *
 * @method     \models\AssignatureQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildNote findOne(ConnectionInterface $con = null) Return the first ChildNote matching the query
 * @method     ChildNote findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNote matching the query, or a new ChildNote object populated from the query conditions when no match is found
 *
 * @method     ChildNote findOneById(int $id) Return the first ChildNote filtered by the id column
 * @method     ChildNote findOneByFilename(string $filename) Return the first ChildNote filtered by the filename column
 * @method     ChildNote findOneByExtension(string $extension) Return the first ChildNote filtered by the extension column
 * @method     ChildNote findOneByDescription(string $description) Return the first ChildNote filtered by the description column
 * @method     ChildNote findOneByUrl(string $url) Return the first ChildNote filtered by the url column
 * @method     ChildNote findOneByAssignatureId(int $assignature_id) Return the first ChildNote filtered by the assignature_id column *

 * @method     ChildNote requirePk($key, ConnectionInterface $con = null) Return the ChildNote by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOne(ConnectionInterface $con = null) Return the first ChildNote matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNote requireOneById(int $id) Return the first ChildNote filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByFilename(string $filename) Return the first ChildNote filtered by the filename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByExtension(string $extension) Return the first ChildNote filtered by the extension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByDescription(string $description) Return the first ChildNote filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByUrl(string $url) Return the first ChildNote filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByAssignatureId(int $assignature_id) Return the first ChildNote filtered by the assignature_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNote[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNote objects based on current ModelCriteria
 * @method     ChildNote[]|ObjectCollection findById(int $id) Return ChildNote objects filtered by the id column
 * @method     ChildNote[]|ObjectCollection findByFilename(string $filename) Return ChildNote objects filtered by the filename column
 * @method     ChildNote[]|ObjectCollection findByExtension(string $extension) Return ChildNote objects filtered by the extension column
 * @method     ChildNote[]|ObjectCollection findByDescription(string $description) Return ChildNote objects filtered by the description column
 * @method     ChildNote[]|ObjectCollection findByUrl(string $url) Return ChildNote objects filtered by the url column
 * @method     ChildNote[]|ObjectCollection findByAssignatureId(int $assignature_id) Return ChildNote objects filtered by the assignature_id column
 * @method     ChildNote[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NoteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \models\Base\NoteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\models\\Note', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNoteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNoteQuery) {
            return $criteria;
        }
        $query = new ChildNoteQuery();
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
     * @return ChildNote|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NoteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NoteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildNote A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, filename, extension, description, url, assignature_id FROM note WHERE id = :p0';
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
            /** @var ChildNote $obj */
            $obj = new ChildNote();
            $obj->hydrate($row);
            NoteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildNote|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NoteTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NoteTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NoteTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NoteTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
     * $query->filterByFilename('%fooValue%', Criteria::LIKE); // WHERE filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the extension column
     *
     * Example usage:
     * <code>
     * $query->filterByExtension('fooValue');   // WHERE extension = 'fooValue'
     * $query->filterByExtension('%fooValue%', Criteria::LIKE); // WHERE extension LIKE '%fooValue%'
     * </code>
     *
     * @param     string $extension The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByExtension($extension = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($extension)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_EXTENSION, $extension, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_URL, $url, $comparison);
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
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByAssignatureId($assignatureId = null, $comparison = null)
    {
        if (is_array($assignatureId)) {
            $useMinMax = false;
            if (isset($assignatureId['min'])) {
                $this->addUsingAlias(NoteTableMap::COL_ASSIGNATURE_ID, $assignatureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($assignatureId['max'])) {
                $this->addUsingAlias(NoteTableMap::COL_ASSIGNATURE_ID, $assignatureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_ASSIGNATURE_ID, $assignatureId, $comparison);
    }

    /**
     * Filter the query by a related \models\Assignature object
     *
     * @param \models\Assignature|ObjectCollection $assignature The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNoteQuery The current query, for fluid interface
     */
    public function filterByAssignature($assignature, $comparison = null)
    {
        if ($assignature instanceof \models\Assignature) {
            return $this
                ->addUsingAlias(NoteTableMap::COL_ASSIGNATURE_ID, $assignature->getId(), $comparison);
        } elseif ($assignature instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NoteTableMap::COL_ASSIGNATURE_ID, $assignature->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildNoteQuery The current query, for fluid interface
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
     * @param   ChildNote $note Object to remove from the list of results
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function prune($note = null)
    {
        if ($note) {
            $this->addUsingAlias(NoteTableMap::COL_ID, $note->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the note table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NoteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NoteTableMap::clearInstancePool();
            NoteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NoteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NoteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NoteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NoteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NoteQuery
