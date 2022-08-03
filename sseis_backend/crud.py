from sqlalchemy import true
from sqlalchemy.orm import Session
from fastapi import HTTPException

import models, schemas

def get_usuario(db: Session, usuario_id: int):
    return db.query(models.Usuario).filter(models.Usuario.id == usuario_id).first()

def get_usuarios(db: Session, skip: int = 0, limit: int = 100):
    return db.query(models.Usuario).offset(skip).limit(limit).all()

def create_usuario(db: Session, usuario: schemas.UsuarioCreate):
           
    db_usuario = models.Usuario(
        usuario = usuario.usuario,
        password = usuario.password,
        cargo = usuario.cargo,
        nivel_acceso = usuario.nivel_acceso
    )

    db.add(db_usuario)
    db.commit()
    db.refresh(db_usuario)
    return db_usuario


#Actualizar Usuario - C 
def update_usuarios(db: Session, id_us:int, us:schemas.UsuarioUpdate):
    act_usuario= db.query(models.Usuario).filter(models.Usuario.id== id_us).first()
    act_usuario.usuario= us.usuario
    act_usuario.password= us.password
    act_usuario.cargo= us.cargo
    act_usuario.nivel_acceso= us.nivel_acceso

    db.commit()
    return act_usuario

# DELETE USUARIOS - Y
def delete_usuario(id_usuario: int, db: Session):
    db_usuario = get_usuario(db, id_usuario)
    if db_usuario is None:
      raise HTTPException(status_code=404, detail="Usuario no encontrado")
    db.delete(db_usuario)
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