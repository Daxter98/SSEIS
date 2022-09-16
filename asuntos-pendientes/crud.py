from sqlalchemy import true
from sqlalchemy.orm import Session
from fastapi import HTTPException

import models, schemas

def get_asunto(db: Session, asunto_id: int):
    return db.query(models.Asunto).filter(models.Asunto.id == asunto_id).first()

def get_asuntos(db: Session, skip: int = 0, limit: int = 100):
    return db.query(models.Asunto).offset(skip).limit(limit).all()

def create_asunto(db: Session, asunto: schemas.AsuntoCreate):
           
    db_asunto= models.Asunto(
    
        id = asunto.id,
        idArea = asunto.idArea,
        Cve_estatus = asunto.Cve_estatus,
        Descripcion = asunto.Descripcion,
        Prioridad = asunto.Prioridad,
        Fecha_limite = asunto.Fecha_limite,
        Fecha_respuesta = asunto.Fecha_respuesta,
    )

    db.add(db_asunto)
    db.commit()
    db.refresh(db_asunto)
    return db_asunto


#Actualizar Asunto 
def update_asunto(db: Session, id_asunto:int, us:schemas.AsuntoUpdate):
    act_asunto= db.query(models.Asunto).filter(models.Asunto.id== id_asunto).first()
    act_asunto.asunto= us.asunto
    act_asunto.prioridad= us.prioridad
    act_asunto.fecha_lim= us.fecha_lim
    act_asunto.estatus= us.estatus
    act_asunto.fecha_res= us.fecha_res

    db.commit()
    return act_asunto

# DELETE ASUNTOS
def delete_asunto(id_asunto: int, db: Session):
    db_asunto = get_asunto(db, id_asunto)
    if db_asunto is None:
      raise HTTPException(status_code=404, detail="Asunto no encontrado")
    db.delete(db_asunto)
    db.commit()
    return {"ok": True}


# def update_paciente(id_paciente: int, db: Session, paciente: schemas.Paciente):
#     db_paciente = get_paciente(db, id_paciente)

#     if db_paciente is None: 
#         raise HTTPException(status_code=404, detail="Paciente no encontrado")

#     for k, v in vars(paciente).items():
#         setattr(db_paciente, k, v) if v else None
    
#     db.add(db_paciente)
#     db.commit()
#     db.refresh(db_paciente)
#     return db_paciente



# # Operaciones de delete para usuarios
# def delete_paciente(id_paciente: int, db: Session):
#     db_paciente = get_paciente(db, id_paciente)

#     if db_paciente is None:
#         raise HTTPException(status_code=404, detail="Cita no encontrada")

#     db.delete(db_paciente)
#     db.commit()

#     return {"ok": True}