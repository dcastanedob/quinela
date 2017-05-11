<?php



/**
 * This class defines the structure of the 'participante' table.
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
class ParticipanteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'quinela.map.ParticipanteTableMap';

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
        $this->setName('participante');
        $this->setPhpName('Participante');
        $this->setClassname('Participante');
        $this->setPackage('quinela');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idparticipante', 'Idparticipante', 'INTEGER', true, null, null);
        $this->addColumn('participante_nombre', 'ParticipanteNombre', 'VARCHAR', true, 45, null);
        $this->addColumn('participante_estatus', 'ParticipanteEstatus', 'TINYINT', true, null, 1);
        $this->addForeignKey('idequipo', 'Idequipo', 'INTEGER', 'equipo', 'idequipo', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Equipo', 'Equipo', RelationMap::MANY_TO_ONE, array('idequipo' => 'idequipo', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ParticipanteTableMap
