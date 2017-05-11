<?php



/**
 * This class defines the structure of the 'equipo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.quinela.map
 */
class EquipoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'quinela.map.EquipoTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('equipo');
        $this->setPhpName('Equipo');
        $this->setClassname('Equipo');
        $this->setPackage('quinela');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idequipo', 'Idequipo', 'INTEGER', true, null, null);
        $this->addColumn('equipo_nombre', 'EquipoNombre', 'VARCHAR', true, 45, null);
        $this->addColumn('equipo_img', 'EquipoImg', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Participante', 'Participante', RelationMap::ONE_TO_MANY, array('idequipo' => 'idequipo', ), 'CASCADE', 'CASCADE', 'Participantes');
    } // buildRelations()

} // EquipoTableMap
